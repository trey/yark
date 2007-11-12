<?php
function find_template($section)
{
	// Template with the name of the section doesn't exist.
	if (!file_exists(TEMPLATE_PATH . '/' . $section . '.php')) {
		$template = 'index';
	} else {
		$template = $section;
	}

	return $template;
}

function find_page($section, $subsection, $page)
{
	$page_path = '';
	
	// If there is a section or sub-section, add a trailing slash.
	if (!empty($section)) { $section .= '/'; }
	if (!empty($subsection)) { $subsection .= '/'; }
	
	$page_path = $section . $subsection . $page;
	
	return $page_path;
}

function display_page($section, $subsection, $page, $template, $page_path)
{
	// Debug panel
	if (SITE_DEBUG) {
		$debug  = 'File: '. CONTENT_PATH . '/' . $page_path . '.txt';
		$debug .= '<br>';
		$debug .= 'Template: ' . TEMPLATE_PATH . '/' . $template . '.php';
		$debug .= '<br>';
		$debug .= 'Page: ' . $page;
		$debug .= '<br>';
		$debug .= 'Section: ' . $section;
		$debug .= '<br>';
		$debug .= 'Subsection: ' . $subsection;
	}

	// Page not found
	if (!file_exists(CONTENT_PATH . '/' . $page_path . '.txt')) {
		$page_path = 'errors/404';
		// $template = 'index';
	}

	// Generate HTML from Markdown + SmartyPants and feed it to Haml:
	$content = SmartyPants(Markdown(file_get_contents(CONTENT_PATH . '/' . $page_path . '.txt')));

	switch (SITE_TEMPLATE_TYPE) {
		case 'php':
			include(TEMPLATE_PATH . '/' . $template . '.php');
			break;
		case 'haml':
			display_haml(TEMPLATE_PATH . '/' . $template . '.haml', array(SITE_TITLE, SITE_SUBTITLE, $content), HAML_TEMP_PATH);
			break;
	}
}
?>
