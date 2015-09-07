<?php

namespace Slab\Cli;

use Slab\Core\ContainerInterface;

/**
 * Command
 *
 * @package default
 * @author Luke Lanchester
 **/
abstract class Command implements CommandInterface {


	/**
	 * @var string Command name
	 **/
	protected $name;


	/**
	 * @var string Command description
	 **/
	protected $description;


	/**
	 * @var string Method to execute
	 **/
	protected $execute_method = 'fire';


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
	 * Set method to be executed on trigger
	 *
	 * @param string Method name
	 * @return void
	 **/
	public function setExecuteMethod($method) {

		$this->execute_method = $method;

	}



	/**
	 * Get method to be executed on trigger
	 *
	 * @return string Method name
	 **/
	public function getExecuteMethod() {

		return $this->execute_method;

	}



	/**
	 * Execute the command with the provided input
	 *
	 * @param Slab\Core\ContainerInterface
	 * @param array Arguments
	 * @param array Options
	 * @return int Exit status
	 **/
	public function executeCommand(ContainerInterface $container, array $arguments, array $options) {

		// var_dump("Executing {$this->name}", $arguments, $options);

		// $this->setOutputter($container->make('Slab\Cli\Outputter'));

		return $container->fireMethod($this, $this->getExecuteMethod());

	}



}
