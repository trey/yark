<?php
// TODO: Get path from URL, check for file in /content folder (page_name)
// TODO: somehow determine which template to use to render it (template_name)

// Load $_GET variabes, if any.
$section     = (isset($_GET['section']))     ? $_GET['section']     : '';
$sub_section = (isset($_GET['sub_section'])) ? $_GET['sub_section'] : '';
$page        = (isset($_GET['page']))        ? $_GET['page']        : '';

if (empty($section) && empty($page)) {
	// Root page
	if (file_exists(CONTENT_PATH . '/' . 'home.txt')) {
		$template = 'home';
		$page = $template;

		display_page($site, $section, $sub_section, $page, $template);
	} else {
		display_page($site, $error_404);
	}
}

	// Section

		// Sub-section

	// or Error

	// ---
	
// Find Haml template needed
	// (Find template type)

?>