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


	protected function configure()
	    {
	        $this
	            ->setName('demo:greet')
	            ->setDescription('Greet someone')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Who do you want to greet?'
            )
            ->addOption(
               'yell',
               null,
               InputOption::VALUE_NONE,
               'If set, the task will yell in uppercase letters'
            )
	        ;
	    }


	    protected function execute(InputInterface $input, OutputInterface $output)
	        {
	            $name = $input->getArgument('name');
	            if ($name) {
	                $text = 'Hello '.$name;
	            } else {
	                $text = 'Hello';
	            }

	            if ($input->getOption('yell')) {
	                $text = strtoupper($text);
	            }

	            $output->writeln($text);
	        }


	/**
	 * Execute the command
	 *
	 * @return void
	 **/
	public function fire() {

		echo 'me';

	}



}
