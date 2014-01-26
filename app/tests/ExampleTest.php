<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		$this->prepareForTests();
	}
	/**
     * Migrates the database and set the mailer to 'pretend'.
     * This will cause the tests to run quickly.
     *
     */
    private function prepareForTests()
    {
        Artisan::call('migrate'); //Don't need yet
        Mail::pretend(true);
    }
	// public function testBasicExample()
	// {
	// 	$crawler = $this->client->request('GET', '/');

	// 	$this->assertTrue($this->client->getResponse()->isOk());
	// }
	public function testIndexPagenoLogin()
	{

		Auth::shouldReceive('check')->andReturn(false);//Pretends we're not logged in

		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
	public function testIndexPageWithLogin()
	{

		Auth::shouldReceive('check')->andReturn(true); //Pretends we're logged in

		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

}
