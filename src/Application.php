<?php

namespace Slab\Cli;

use Symfony\Component\Console\Application as SymfonyApplication;

/**
 * CLI Application
 *
 * @package default
 * @author Luke Lanchester
 **/
class Application {


	/**
	 * @var Symfony\Component\Console\Application
	 **/
	protected $app;


	/**
	 * Constructor
	 *
	 * @param Slab\Cli\CommandCollection
	 * @return void
	 **/
	public function __construct(CommandCollection $commands) {

		$this->app = new SymfonyApplication;

		$this->app->setName('slab');
		$this->app->setVersion(SLAB_CLI_VER);
		$this->app->addCommands($commands->getCommands());

	}



	/**
	 * Run the app
	 *
	 * @return void
	 **/
	public function run() {

		return $this->app->run();

	}



}
