<?php

use Mockery as m;

use Slab\Cli\CommandCollection;

/**
 * Test CommandCollection
 *
 * @package default
 * @author Luke Lanchester
 **/
class CommandCollectionTest extends PHPUnit_Framework_TestCase {


	/**
	 * Test can instantiate an empty command collection
	 *
	 * @return void
	 **/
	public function testCanInstantiateCollection() {

		$container = m::mock('Slab\Core\ContainerInterface');

		$collection = new CommandCollection($container);
		$this->assertInstanceOf('Slab\Cli\CommandCollection', $collection);

	}



	/**
	 * Tear down tests
	 *
	 * @return void
	 **/
	public function tearDown() {

		m::close();

	}



}
