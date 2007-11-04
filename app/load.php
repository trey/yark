<?php

// Get the base folder of the site and remove '/public' from the end of it.
define("BASE_PATH", substr(getcwd(), 0, -7));

define('TEMPLATE_PATH',  BASE_PATH    . '/' . 'templates');
define('CONTENT_PATH',   BASE_PATH    . '/' . 'content');
define('ERRORS_PATH',    CONTENT_PATH . '/' . 'errors');
define('HAML_TEMP_PATH', BASE_PATH    . '/' . 'tmp/haml');

// PHP YAML Parser --> http://spyc.sourceforge.net/
require_once(BASE_PATH . '/vendor/spyc.php');
// PHP Markdown Extra --> http://www.michelf.com/projects/php-markdown/extra/
require_once(BASE_PATH . '/vendor/markdown.php');
// PHP SmartyPants --> http://michelf.com/projects/php-smartypants/
require_once(BASE_PATH . '/vendor/smartypants.php');
// PHP Haml Parser --> http://phphaml.sourceforge.net/
require_once(BASE_PATH . '/vendor/haml/HamlParser.class.php');

// Load configuration file
$site = Spyc::YAMLLoad(BASE_PATH . '/config.yaml');

// Load old school procedural functions
require_once('functions.php');

?>
