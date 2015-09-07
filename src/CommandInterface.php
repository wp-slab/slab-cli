<?php

namespace Slab\Cli;

use Slab\Core\ContainerInterface;

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
	 * @param Slab\Core\ContainerInterface
	 * @param array Arguments
	 * @param array Options
	 * @return int Exit status
	 **/
	public function executeCommand(ContainerInterface $container, array $arguments, array $options);


}
