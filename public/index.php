<?php
require_once('../app/load.php');
require_once('../app/functions.php');

$page = find_page($section, $subsection, $page_name);
$template = find_template($page);

display_page($template, $page);
?>
