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
	 * @var array Resolved commands
	 **/
	protected $_commands;


	/**
	 * @var bool Is $commands dirty?
	 **/
	protected $_dirty = false;


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
	 * Add a command
	 *
	 * @param Slab\Cli\CommandInterface
	 * @return void
	 **/
	public function addCommand(CommandInterface $command) {

		$this->commands[] = [true, $command];

		$this->_dirty = true;

		// $name = $command->getName();

		// if(array_key_exists($name, $this->commands)) {
		// 	throw new RuntimeException("A command with the same name already exists: $name");
		// }

		// $this->commands[$name] = $command;

	}



	/**
	 * Resolve a command
	 *
	 * @param class Command class
	 * @return void
	 **/
	public function resolve($str) {

		$this->commands[] = [null, $str];

		$this->_dirty = true;

		// $pos = strpos($str, '@');

		// if($pos === false) {
		// 	$class = $str;
		// 	$method = null;
		// } else {
		// 	$class = substr($str, 0, $pos);
		// 	$method = substr($str, $pos + 1);
		// }

		// $command = $this->container->make($class);

		// if($method) {
		// 	$command->setMethod($method);
		// }

		// return $this->addCommand($command);

	}



	/**
	 * Get all commands
	 *
	 * @return array Slab\Cli\CommandInterface
	 **/
	public function getCommands() {

		if($this->_commands !== null and $this->_dirty === false) {
			return $this->_commands;
		}

		$commands = [];

		foreach($this->commands as $i => $command) {

			if($command[0] === true) {
				$commands[] = $command[1];
				continue;
			}

			$str = $command[1];

			$pos = strpos($str, '@');

			if($pos === false) {
				$class = $str;
				$method = null;
			} else {
				$class = substr($str, 0, $pos);
				$method = substr($str, $pos + 1);
			}

			$cmd = $this->container->make($class);

			if($method) {
				$cmd->setMethod($method);
			}

			$this->commands[$i] = [true, $cmd];
			$commands[] = $cmd;

		}

		$this->_dirty = false;

		return $this->_commands = $commands;

	}



}
