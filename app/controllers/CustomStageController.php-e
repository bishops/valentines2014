<?php
interface CustomStageInterface 
{
	public function getStage();
}

class FileCustomStage implements CustomStageInterface
{
	public $config;

	public function __construct()
	{
		$this->loadConfig();
	}
	public function loadConfig()
	{
		$this->config = include(dirname(__FILE__).'/../custom/stage.php');
		if( $this->config == NULL)
		{
			throw new Exception("Error Processing Request", 1);
		}
	}
	public function getStage($index = "")
	{
		// var_dump("hitting the real deal");
		return $this->config[$index];
	}
}

