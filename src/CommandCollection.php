<?php

namespace Slab\Cli;

use RuntimeException;

use Slab\Core\ContainerInterface;

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
	 * @var Slab\Core\ContainerInterface
	 **/
	protected $container;


	/**
	 * Constructor
	 *
	 * @param Slab\Core\ContainerInterface
	 * @return void
	 **/
	public function __construct(ContainerInterface $container) {

		$this->container = $container;

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



	/**
	 * Resolve a command
	 *
	 * @param class Command class
	 * @return void
	 **/
	public function resolve($str) {

		$pos = strpos($str, '@');

		if($pos === false) {
			$class = $str;
			$method = null;
		} else {
			$class = substr($str, 0, $pos);
			$method = substr($str, $pos + 1);
		}

		$command = $this->container->make($class);

		if($method) {
			$command->setExecuteMethod($method);
		}

		return $this->addCommand($command);

	}



}
