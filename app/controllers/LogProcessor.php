<?php
class LogProcessor
{
	public function fire($job, $data)
	{
		$log = new LogC();

		$log->user_id = $data['user_id'];
		$log->page_id = $data['page_id'];
		
		$log->save();

		$job->delete();
	}
	
}
