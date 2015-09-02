<?php

namespace Slab\Cli\Commands;

use Slab\Cli\CommandInterface;

/**
 * List Commands Command
 *
 * @package default
 * @author Luke Lanchester
 **/
class ListCommandsCommand implements CommandInterface {


	/**
	 * @var string Command name
	 **/
	protected $name = 'list';


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

		$commands = slab('Slab\Cli\CommandCollection')->getCommands();

		foreach($commands as $command) {
			echo $command->getName() . "\n";
		}

		return 0;

	}



}
