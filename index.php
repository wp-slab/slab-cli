<?php
/*
Plugin Name: Slab &mdash; CLI
Plugin URI: http://www.wp-slab.com/components/cli
Description: The Slab Command Line component. Create and execute commands against your site.
Version: 1.0.0
Author: Slab
Author URI: http://www.wp-slab.com
Created: 2015-08-09
Updated: 2015-08-09
Repo URI: github.com/wp-slab/slab-cli
Requires: slab-core
*/


// Define
define('SLAB_CLI_INIT', true);
define('SLAB_CLI_DIR', plugin_dir_path(__FILE__));
define('SLAB_CLI_URL', plugin_dir_url(__FILE__));


// Hooks
add_action('slab_init', 'slab_cli_init');


// Init
function slab_cli_init($slab) {

	$slab->autoloader->registerNamespace('Slab\Cli', SLAB_CLI_DIR . 'src');

	$slab->singleton('Slab\Cli\CommandCollection', 'Slab\Cli\CommandCollection');
	$slab->alias('commands', 'Slab\Cli\CommandCollection');

}


// Default commands
add_action('slab_commands', function($commands){

	$commands->addCommand(new Slab\Cli\Command('list'));
	$commands->addCommand(new Slab\Cli\Command('help'));
	$commands->addCommand(new Slab\Cli\Command('cron'));

});
