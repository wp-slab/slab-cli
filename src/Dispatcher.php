<?php

namespace Slab\Cli;

use RuntimeException;

use Slab\Core\ContainerInterface;

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
	 * @var Slab\Core\ContainerInterface
	 **/
	protected $container;


	/**
	 * Constructor
	 *
	 * @param Slab\Core\ContainerInterface
	 * @param Slab\Cli\CommandCollection
	 * @param Slab\Cli\InputParser
	 * @return void
	 **/
	public function __construct(ContainerInterface $container, CommandCollection $commands, InputParser $parser) {

		$this->container = $container;
		$this->commands = $commands;
		$this->parser = $parser;

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

		return $this->container->fireMethod($command, 'executeCommand', [$arguments, $options]);

	}



}
