<?php

namespace Slab\Cli;

use RuntimeException;

/**
 * Command Collection
 *
 * @package default
 * @author Luke Lanchester
 **/
class CommandCollection {


	/**
	 * @var array Commands
	 **/
	protected $commands = [];



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
	 * Add a command
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
