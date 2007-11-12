<?php

require_once('../app/load.php');
require_once('../app/functions.php');

$page_path = find_page($section, $subsection, $page);
display_page($section, $subsection, $page, find_template($section), $page_path);

	// Section

		// Sub-section

	// or Error

	// ---
	
// Find Haml template needed
	// (Find template type)

?>
