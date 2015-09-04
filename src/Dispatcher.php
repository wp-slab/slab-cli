<?php

namespace Slab\Cli;

use RuntimeException;

/**
 * Dispatcher a command line request
 *
 * @package default
 * @author Luke Lanchester
 **/
class Dispatcher {


	/**
	 * @var Slab\Cli\CommandCollection
	 **/
	protected $commands;


	/**
	 * @var Slab\Cli\InputParser
	 **/
	protected $parser;


	/**
	 * Constructor
	 *
	 * @param Slab\Cli\CommandCollection
	 * @return void
	 **/
	public function __construct(CommandCollection $commands) {

		$this->commands = $commands;
		$this->parser = new InputParser;

	}



	/**
	 * Dispatch a request
	 *
	 * @param array Argv values
	 * @return mixed Result
	 **/
	public function dispatch(array $argv) {

		list($name, $arguments, $options) = $this->parser->parseInput($argv);

		if(empty($name)) {
			$name = 'list';
		}

		$command = $this->commands->getCommand($name);

		if(!$command) {
			throw new RuntimeException("Command not found: $name");
		}

		return $command->executeCommand($arguments, $options);

	}



}
