<?php

class MatchProcessor
{
	public function fire($job, $data)
	{
		$user = User::find($data['user_id']);

		foreach (User::where('id','<>',$data['user_id'])->get() as $key => $value) {
			$match = new Match;
			$match->user_id_1 = $user->id;
			$match->user_id_2 = $value->id;
			$match->match_score = $this->calcMatch($user,$value);
			$math->save();
		}

		$job->delete();
	}
	private function calcMatch($user1,$user2)
	{
		$q1 = $user1->questionResponses()->orderBy('question_id', 'asc')->get();
		$q2 = $user2->questionResponses()->orderBy('question_id', 'asc')->get();
		if( $q1->count() != $q2->count())
		{
			echo "error";
			exit;
		}
		$matches = 0;
		$q2 = $q2->toArray();
		foreach ($q1 as $key => $value) {
			if($value->answer == $q2[$key]['answer']){
				$matches ++;
			}	
		}
		return  $matches/$q1->count();
	}
}
