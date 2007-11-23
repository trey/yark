<?php
// Load $_GET variabes, if any.
$section    = (isset($_GET['section']))    ? $_GET['section']    : '';
$subsection = (isset($_GET['subsection'])) ? $_GET['subsection'] : '';
$page_name  = (isset($_GET['page']))       ? $_GET['page']       : '';

// If $page is empty, use 'index'.
if (empty($page_name)) $page_name = 'index';

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

define('SITE_TITLE',         $site['title']);
define('SITE_SUBTITLE',      $site['subtitle']);
define('SITE_DEBUG',         $site['debug']);
define('SITE_TEMPLATE_TYPE', $site['template_type']);
?>
