<?php

namespace Slab\Cli\Commands;

use Slab\Cli\Command;
use Slab\Cli\CommandCollection;

/**
 * List Commands Command
 *
 * @package default
 * @author Luke Lanchester
 **/
class ListCommandsCommand extends Command {


	/**
	 * @var string Command name
	 **/
	protected $name = 'list';


	/**
	 * Execute the command
	 *
	 * @param Slab\Cli\CommandCollection
	 * @return void
	 **/
	public function fire(CommandCollection $commands) {

		foreach($commands->getCommands() as $command) {
			echo $command->getName() . "\n";
		}

		return 0;

	}



}
