<?php

namespace Slab\Cli;

/**
 * Initialize Slab CLI
 *
 * @param Slab\Core\Application
 * @return void
 **/
function slab_cli_init($slab) {

	// $slab->autoloader->registerNamespace('Slab\Cli', SLAB_CLI_DIR . 'src');

	$slab->singleton('Slab\Cli\CommandCollection', function($app){
		$collection = new CommandCollection($app);
		do_action('slab_cli_commands', $collection);
		return $collection;
	});

	$slab->alias('commands', 'Slab\Cli\CommandCollection');

}


/**
 * Initialize Slab Router
 *
 * @param Slab\Cli\CommandCollection
 * @return void
 **/
function slab_cli_default_commands($commands) {

	$commands->resolve('Slab\Cli\Commands\TestCommand');

	// $commands->resolve('Slab\Cli\Commands\ListCommandsCommand');
	// $commands->addCommand(new Slab\Cli\Command('help'));
	// $commands->addCommand(new Slab\Cli\Command('cron'));

}
