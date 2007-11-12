<?php

require_once('../app/load.php');
require_once('../app/functions.php');

// $content = SmartyPants(Markdown(file_get_contents(CONTENT_PATH . '/' . $page_name . '.txt')));
// display_haml(TEMPLATE_PATH . '/' . $template_name . '.haml', array($site, $content), HAML_TEMP_PATH);

$page_path = find_page($section, $subsection, $page);
display_page($section, $subsection, $page, find_template($section), $page_path);

	// Section

		// Sub-section

	// or Error

	// ---
	
// Find Haml template needed
	// (Find template type)

?>
