<?php

namespace Slab\Cli;

/**
 * Input Parser
 *
 * @package default
 * @author Luke Lanchester
 **/
class InputParser {


	/**
	 * Parse input args into command, arguments and options
	 *
	 * @param array Input
	 * @return array [command, args, options]
	 **/
	public function parseInput(array $input) {

		if(empty($input[1])) {
			return [null, [], []];
		}

		array_shift($input); // first value is script name

		$command = array_shift($input);
		$arguments = [];
		$options = [];

		foreach($input as $str) {

			if(substr($str, 0, 2) == '--') {
				$options[] = $this->parseOption($str);
			} else {
				$arguments[] = $this->parseArgument($str);
			}

		}

		return [$command, $arguments, $options];

	}



	/**
	 * Parse a raw argument string into a key value pair
	 *
	 * value
	 *   => value
	 *
	 * @param string Raw string
	 * @return string value
	 **/
	public function parseArgument($str) {

		return $str;

	}



	/**
	 * Parse a raw option string into a key value pair
	 *
	 * --key=value
	 *   => [key, value]
	 *
	 * @param string Raw string
	 * @return array [key, value]
	 **/
	public function parseOption($str) {

		$str = substr($str, 2);

		$pos = strpos($str, '=');

		if($pos === false) {
			return [$str, true];
		}

		$key = substr($str, 0, $pos);
		$value = substr($str, $pos + 1);

		return [$key, $value];

	}



}
