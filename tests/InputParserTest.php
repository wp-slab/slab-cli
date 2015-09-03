<?php

use Mockery as m;

use Slab\Cli\InputParser;

/**
 * Test InputParser
 *
 * @package default
 * @author Luke Lanchester
 **/
class InputParserTest extends PHPUnit_Framework_TestCase {


	/**
	 * Test can instantiate an empty command collection
	 *
	 * @return void
	 **/
	public function testCanInstantiateParser() {

		$parser = new InputParser;
		$this->assertInstanceOf('Slab\Cli\InputParser', $parser);

	}



	// public function parseInput(array $input) {



	/**
	 * Test argument parser
	 *
	 * @param string Input string
	 * @param string Expected key
	 * @param mixed Expected value
	 * @return void
	 * @dataProvider argumentsProvider
	 **/
	public function testArgumentParser($str, $test_arg) {

		$parser = new InputParser;

		$result = $parser->parseArgument($str);

		$this->assertEquals($test_arg, $result);

	}



	/**
	 * Data provider for arguments
	 *
	 * @return array Arguments
	 **/
	public function argumentsProvider() {

		return [
			['foo', 'foo'],
			['"do something"', 'do something'],
		];

	}




	/**
	 * Test option parser
	 *
	 * @param string Input string
	 * @param string Expected key
	 * @param mixed Expected value
	 * @return void
	 * @dataProvider optionsProvider
	 **/
	public function testOptionParser($str, $test_key, $test_value) {

		$parser = new InputParser;

		$result = $parser->parseOption($str);

		$this->assertEquals([$test_key, $test_value], $result);

	}



	/**
	 * Data provider for options
	 *
	 * @return array Options
	 **/
	public function optionsProvider() {

		return [
			['--foo', 'foo', true],
			['--foo=bar', 'foo', 'bar'],
			['--foo="bar baz"', 'foo', 'bar baz'],
		];

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
