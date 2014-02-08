<?php


class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function __construct(CustomStageInterface $stage)
	{
		$this->stage = $stage;
	}
	public function showWelcome()
	{
		return View::make('hello');
	}
	public function showResults()
	{
		if( $this->stage->getStage('results_complete') == true )
		{
			$user = Auth::user();
			$this->fillMatches($user);
			return View::make('results')->with($this->prepareViewData( $user ));
		}
		else 
		{
			return View::make('notresults', array('answer_reveal'=>$this->stage->getStage('answer_reveal') ) );
		}
	}
	private function prepareViewData( $user )
	{
		$all_ids = array();
		$user->jschool_matches = json_decode($user->school_matches);
		foreach ($user->jschool_matches->m as $key => $value) {
			$all_ids = $this->addNoExist( $all_ids , $value);
		}
		foreach ($user->jschool_matches->f as $key => $value) {
			$all_ids = $this->addNoExist( $all_ids , $value);
		}
		$user->jgrade_matches = json_decode($user->grade_matches);
		foreach ($user->jgrade_matches->m as $key => $value) {
			$all_ids = $this->addNoExist( $all_ids , $value);
		}
		foreach ($user->jgrade_matches->f as $key => $value) {
			$all_ids = $this->addNoExist( $all_ids , $value);
		}
		$all_ids = $this->addNoExist( $all_ids , $user->nemesis);
		$matched_users = User::find($all_ids);
		return array('user'=>$user,'matched_users'=>$matched_users);
	}
	private function addNoExist( $array, $value )
	{
		if( ! in_array($value, $array))
		{
			array_push($array, $value);
		}
		return $array;
	}
	private function fillMatches( $user )
	{	
		$save = 0;
		if( empty( $user->school_matches ) )
		{
			$user = $this->fillSchoolMatch( $user );
			$save ++;
		}
		if( empty( $user->grade_matches ) )
		{
			$user = $this->fillGradeMatch( $user );
			$save ++;
		}
		if( empty( $user->nemesis ) )
		{
			$user = $this->fillNemesisMatch( $user );
			$save ++;
		}
		if ( $save > 0 )
		{
			$user->save();
		}
	}
	private function fillSchoolMatch( $user )
	{
		$pdo = DB::connection()->getPdo();

		$sql = 'SELECT mm.m_id FROM';
		$sql .= ' (SELECT users.gender as m_gender, matches.user_id_2 as u_id, matches.user_id_1 as m_id, matches.match_score as score FROM matches';
		$sql .= ' INNER JOIN users ON users.id = matches.user_id_1 ';
		$sql .= ' UNION ';
		$sql .= ' SELECT users.gender as m_gender, matches.user_id_1 as u_id, matches.user_id_2 as m_id, matches.match_score as score FROM matches';
		$sql .= ' INNER JOIN users ON users.id = matches.user_id_2 ';
		$sql .= ' ) as mm';
		$sql .= ' WHERE mm.u_id = '.$user->id.' AND  mm.m_gender = 1 ORDER BY `score` DESC LIMIT 5';
		
		$matches = $pdo->query($sql);
		$jsonm = array();
		foreach ($matches as $row) {
			array_push($jsonm, $row['m_id']);
		}

		
		$sql = 'SELECT mm.m_id FROM';
		$sql .= ' (SELECT users.gender as m_gender, matches.user_id_2 as u_id, matches.user_id_1 as m_id, matches.match_score as score FROM matches';
		$sql .= ' INNER JOIN users ON users.id = matches.user_id_1 ';
		$sql .= ' UNION ';
		$sql .= ' SELECT users.gender as m_gender, matches.user_id_1 as u_id, matches.user_id_2 as m_id, matches.match_score as score FROM matches';
		$sql .= ' INNER JOIN users ON users.id = matches.user_id_2 ';
		$sql .= ' ) as mm';
		$sql .= ' WHERE mm.u_id = '.$user->id.' AND  mm.m_gender = 0 ORDER BY `score` DESC LIMIT 5';
		
		$matches = $pdo->query($sql);
		$jsonf = array();
		foreach ($matches as $row) {
			array_push($jsonf, $row['m_id']);
		}

		$std = new stdClass();
		$std->m = $jsonm;
		$std->f = $jsonf;
		$user->school_matches = json_encode($std);
		return $user;
	}	
	private function fillNemesisMatch( $user )
	{
		$pdo = DB::connection()->getPdo();

		$sql = 'SELECT mm.m_id FROM';
		$sql .= ' (SELECT matches.user_id_2 as u_id, matches.user_id_1 as m_id, matches.match_score as score FROM matches';
		// $sql .= ' INNER JOIN users ON users.id = matches.user_id_1 ';
		$sql .= ' UNION ';
		$sql .= ' SELECT matches.user_id_1 as u_id, matches.user_id_2 as m_id, matches.match_score as score FROM matches';
		// $sql .= ' INNER JOIN users ON users.id = matches.user_id_2 ';
		$sql .= ' ) as mm';
		$sql .= ' WHERE mm.u_id = '.$user->id.'  ORDER BY `score` ASC LIMIT 1';
		
		$matches = $pdo->query($sql);
		$jsonm = array();
		foreach ($matches as $row) {
			array_push($jsonm, $row['m_id']);
		}

		$user->nemesis = $jsonm[0];
		return $user;
	}
	private function fillGradeMatch( $user )
	{
		$pdo = DB::connection()->getPdo();

		$sql = 'SELECT mm.m_id FROM';
		$sql .= ' (SELECT users.grad_year as m_grad_year, users.gender as m_gender, matches.user_id_2 as u_id, matches.user_id_1 as m_id, matches.match_score as score FROM matches';
		$sql .= ' INNER JOIN users ON users.id = matches.user_id_1 ';
		$sql .= ' UNION ';
		$sql .= ' SELECT users.grad_year as m_grad_year, users.gender as m_gender, matches.user_id_1 as u_id, matches.user_id_2 as m_id, matches.match_score as score FROM matches';
		$sql .= ' INNER JOIN users ON users.id = matches.user_id_2 ';
		$sql .= ' ) as mm';
		$sql .= ' WHERE mm.u_id = '.$user->id.' AND  mm.m_gender = 1 AND mm.m_grad_year = '.$user->grad_year.' ORDER BY `score` DESC LIMIT 5';
		
		$matches = $pdo->query($sql);
		$jsonm = array();
		foreach ($matches as $row) {
			array_push($jsonm, $row['m_id']);
		}

		
		$sql = 'SELECT mm.m_id FROM';
		$sql .= ' (SELECT users.grad_year as m_grad_year, users.gender as m_gender, matches.user_id_2 as u_id, matches.user_id_1 as m_id, matches.match_score as score FROM matches';
		$sql .= ' INNER JOIN users ON users.id = matches.user_id_1 ';
		$sql .= ' UNION ';
		$sql .= ' SELECT users.grad_year as m_grad_year, users.gender as m_gender, matches.user_id_1 as u_id, matches.user_id_2 as m_id, matches.match_score as score FROM matches';
		$sql .= ' INNER JOIN users ON users.id = matches.user_id_2 ';
		$sql .= ' ) as mm';
		$sql .= ' WHERE mm.u_id = '.$user->id.' AND  mm.m_gender = 0 AND mm.m_grad_year = '.$user->grad_year.' ORDER BY `score` DESC LIMIT 5';
		
		$matches = $pdo->query($sql);
		$jsonf = array();
		foreach ($matches as $row) {
			array_push($jsonf, $row['m_id']);
		}

		$std = new stdClass();
		$std->m = $jsonm;
		$std->f = $jsonf;
		$user->grade_matches = json_encode($std);
		return $user;
	}

}
