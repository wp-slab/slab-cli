<?php

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

		$collection = new CommandCollection;
		$this->assertInstanceOf('Slab\Cli\CommandCollection', $collection);

	}



}
