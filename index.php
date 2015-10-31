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
define('SLAB_CLI_VER', '1.0.0');


// Includes
include SLAB_CLI_DIR . 'functions.php';


// Hooks
add_action('slab_init', 'Slab\Cli\slab_cli_init');
add_action('slab_cli_commands', 'Slab\Cli\slab_cli_default_commands');
