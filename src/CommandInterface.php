<?php

namespace Slab\Cli;

/**
 * Command Interface
 *
 * @package default
 * @author Luke Lanchester
 **/
interface CommandInterface {


	/**
	 * Get command name
	 *
	 * @return string Name
	 **/
	public function getName();


	/**
	 * Execute the command with the provided input
	 *
	 * @param array Arguments
	 * @param array Options
	 * @return int Exit status
	 **/
	public function executeCommand(array $arguments, array $options);


}
