<?php

namespace Slab\Cli;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Slab\Core\ContainerInterface;

/**
 * Command
 *
 * @package default
 * @author Luke Lanchester
 **/
abstract class Command extends SymfonyCommand {


	/**
	 * @var Slab\Core\ContainerInterface
	 **/
	protected $container;


	/**
	 * @var Symfony\Component\Console\Input\InputInterface
	 **/
	protected $input;


	/**
	 * @var Symfony\Component\Console\Output\OutputInterface
	 **/
	protected $output;


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
	protected $method = 'fire';


	/**
	 * Constructor
	 *
	 * @param Slab\Core\ContainerInterface
	 * @return void
	 **/
	public function __construct(ContainerInterface $container) {

		$this->container = $container;

		parent::__construct();

	}



	/**
	 * Command arguments
	 *
	 * @return array Arguments
	 **/
	public function getArguments() {

		return [];

	}



	/**
	 * Command options
	 *
	 * @return array Options
	 **/
	public function getOptions() {

		return [];

	}



	/**
	 * Set method to be run
	 *
	 * @param string Method name
	 * @return void
	 **/
	public function setMethod($method) {

		$this->method = $method;

	}



	/**
	 * Get method to be run
	 *
	 * @return string Method name
	 **/
	public function getMethod() {

		return $this->method;

	}



	/**
	 * Configure command
	 *
	 * @return void
	 **/
	protected function configure() {

		$this->setName($this->name);
		$this->setDescription($this->description);

		foreach($this->getArguments() as $arg) {
			$this->addArgument($arg[0], $arg[1], $arg[2], $arg[3]);
		}

		foreach($this->getOptions() as $opt) {
			$this->addOption($opt[0], $opt[1], $opt[2], $opt[3], $opt[4]);
		}

	}



	/**
	 * Execute command
	 *
	 * @param Symfony\Component\Console\Input\InputInterface
	 * @param Symfony\Component\Console\Output\OutputInterface
	 * @return void
	 **/
	protected function execute(InputInterface $input, OutputInterface $output) {

		$this->input = $input;
		$this->output = $output;

		$method = $this->getMethod();

		$this->container->fireMethod($this, $method); // @todo resolve slab()

	}



	/**
	 * Get argument
	 *
	 * @param string Argument name
	 * @return mixed Argument value
	 **/
	public function argument($name) {

		return $this->input->getArgument($name);

	}



	/**
	 * Get option
	 *
	 * @param string Option name
	 * @return mixed Option value
	 **/
	public function option($name) {

		return $this->input->getOption($name);

	}



	/**
	 * Write output
	 *
	 * @param string Output
	 * @return void
	 **/
	public function write($msg) {

		$this->output->writeln($msg);

	}



}
