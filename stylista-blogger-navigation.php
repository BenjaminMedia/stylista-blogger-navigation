<?php

/**
 * Stylista Blogger Navigation
 *
 *
 * Plugin Name:       Stylista Blogger Navigation
 * Plugin URI:
 * Description:       A plugin to include the stylista.dk's bloggers menu.
 * Version:           2.2
 * Author:            Frederik Rabøl — Bonnier Interactive
 * Author URI:        http://bonnierpublications.com
 */

require_once plugin_dir_path( __FILE__ ) . 'BloggerNavigation.php';

$navigation = new BloggerNavigation();
$navigation->run();

