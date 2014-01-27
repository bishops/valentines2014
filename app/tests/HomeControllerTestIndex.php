<?php

class HomeControllerTestIndex extends TestCase
{
	public function testIndexPagenoLogin()
	{
		Auth::shouldReceive('check')->andReturn(false);//Pretends we're not logged in

		$crawler = $this->client->request('GET', '/');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
