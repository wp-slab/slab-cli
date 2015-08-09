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



}
