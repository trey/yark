<?php

require_once('../app/load.php');
require_once('../app/functions.php');

$page_path = find_page($section, $subsection, $page);
// Real page or error page?
if (empty($page_path)) {
	header("HTTP/1.0 404 Not Found");
	$section = 'error';
	$page_path = 'errors/404';
}
display_page($section, $subsection, $page, find_template($section), $page_path);

	// Section

		// Sub-section

	// or Error

	// ---
	
// Find Haml template needed
	// (Find template type)

?>
