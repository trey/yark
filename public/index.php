<?php

require_once('../app/load.php');
// Load old school procedural functions
require_once('../app/functions.php');

// $content = SmartyPants(Markdown(file_get_contents(CONTENT_PATH . '/' . $page_name . '.txt')));
// display_haml(TEMPLATE_PATH . '/' . $template_name . '.haml', array($site, $content), HAML_TEMP_PATH);


// [old controller.php]
// TODO: somehow determine which template to use to render it (template_name)
//       use section_name or fall back to index

$template = $page;
display_page($section, $subsection, $page, $template);

	// Section

		// Sub-section

	// or Error

	// ---
	
// Find Haml template needed
	// (Find template type)

?>
