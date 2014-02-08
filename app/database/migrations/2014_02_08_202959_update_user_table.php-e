<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::create('user', function(Blueprint $table) {
		// 	$table->increments('id');
			
		// 	$table->timestamps();
		// });
		Schema::table('users', function($table)
		{
		    $table->string('grade_matches');
		    $table->string('school_matches');
		    $table->string('nemesis');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
		    $table->dropColumn('grade_matches', 'school_matches', 'nemesis');
		});
	}

}
