<?php
interface CustomStageInterface 
{
	public function getStage();
}

class FileCustomStage implements CustomStageInterface
{
	protected $config_array;

	public function loadConfig()
	{
		$this->config = include('app/custom/stage.php');
	}
	public function getStage($index = "")
	{
		// var_dump("hitting the real deal");
		if( ! isset ( $config_array ) )
		{
			$this->loadConfig();
		}
		return $this->config_array[$index];
	}
}

