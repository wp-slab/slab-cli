<?php

namespace Slab\Cli;

/**
 * Dispatcher a command line request
 *
 * @package default
 * @author Luke Lanchester
 **/
class Dispatcher {


	/**
	 * Dispatch a request
	 *
	 * @param array Argv values
	 * @return mixed Result
	 **/
	public function dispatch(array $argv) {

		array_shift($argv);

		return null;

	}



}
