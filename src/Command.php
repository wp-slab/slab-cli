<?php

namespace Slab\Cli;

/**
 * Command
 *
 * @package default
 * @author Luke Lanchester
 **/
class Command implements CommandInterface {


	/**
	 * @var string Command name
	 **/
	protected $name;


	/**
	 * Constructor
	 *
	 * @param string Command name
	 * @return void
	 **/
	public function __construct($name) {

		$this->setName($name);

	}



	/**
	 * Set command name
	 *
	 * @param string Command name
	 * @return void
	 **/
	public function setName($name) {

		$this->name = strtolower(trim($name));

	}



	/**
	 * Get command name
	 *
	 * @return string Command name
	 **/
	public function getName() {

		return $this->name;

	}



	/**
	 * Execute the command with the provided input
	 *
	 * @param array Arguments
	 * @param array Options
	 * @return int Exit status
	 **/
	public function executeCommand(array $arguments, array $options) {

		var_dump("Executing {$this->name}", $arguments, $options);

		return 0;

	}



}
