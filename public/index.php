<?php
require_once('../app/load.php');
require_once('../app/functions.php');

display_page(find_template($section), find_page($section, $subsection, $page_name));
?>
