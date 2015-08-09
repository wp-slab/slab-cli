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
	 * @var array Commands
	 **/
	protected $commands = [];


	/**
	 * Dispatch a request
	 *
	 * @param array Argv values
	 * @return mixed Result
	 **/
	public function dispatch(array $argv) {

		array_shift($argv);

		$name = array_shift($argv);

		if(empty($name)) {
			$name = 'list';
		}

		$command = $this->getCommand($name);

		if(!$command) {
			throw new RuntimeException("Command not found: $name");
		}

		_print_r($command, $argv);

		return null;

	}



	/**
	 * Get all commands
	 *
	 * @return array Slab\Cli\CommandInterface
	 **/
	public function getCommands() {

		return $this->commands;

	}



	/**
	 * Get a command by name
	 *
	 * @param string Command name
	 * @return Slab\Cli\CommandInterface
	 **/
	public function getCommand($name) {

		return array_key_exists($name, $this->commands) ? $this->commands[$name] : null;

	}



	/**
	 * Register a command
	 *
	 * @param Slab\Cli\CommandInterface
	 * @return void
	 **/
	public function addCommand(CommandInterface $command) {

		$name = $command->getName();

		if(array_key_exists($name, $this->commands)) {
			throw new RuntimeException("A command with the same name already exists: $name");
		}

		$this->commands[$name] = $command;

	}



}
