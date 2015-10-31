<?php

namespace Slab\Cli\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Slab\Cli\Command;

/**
 * Test Command
 *
 * @package default
 * @author Luke Lanchester
 **/
class TestCommand extends Command {


	/**
	 * @var string Command name
	 **/
	protected $name = 'slab:greet';


	/**
	 * @var string Command description
	 **/
	protected $description = 'Say hello to the world';


	/**
	 * Command arguments
	 *
	 * @return array Arguments
	 **/
	public function getArguments() {

		return [
			['name', InputArgument::OPTIONAL, 'Your name', null],
		];

	}



	/**
	 * Command options
	 *
	 * @return array Options
	 **/
	public function getOptions() {

		return [
			['yell', null, InputOption::VALUE_NONE, '', null],
		];

	}



	/**
	 * Run
	 *
	 * @return void
	 **/
	public function go() {

		$name = $this->argument('name');
		$yell = $this->option('yell');

		$message = 'Hello';

		if(!empty($name)) {
			$message .= ", $name";
		}

		if($yell) {
			$message = strtoupper($message);
		}

		$this->write("<info>$message</info>");

	}



}
