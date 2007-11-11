<?php
function display_page($section, $subsection, $page, $template)
{
	// Debug panel
	if (SITE_DEBUG == 'true') {
		$debug  = '<div id="debug">';
		$debug .= 'File: '. CONTENT_PATH . '/' . $section . $subsection . $page . '.txt';
		$debug .= '<br>';
		$debug .= 'Page: ' . $page;
		$debug .= '<br>';
		$debug .= 'Section: ' . $section;
		$debug .= '<br>';
		$debug .= 'Subsection: ' . $subsection;
		$debug .= '</div><!-- #debug -->';
	}

	// Page not found
	if (!file_exists(CONTENT_PATH . '/' . $section . $subsection . $page . '.txt')) {
		$page = '404';
		$section = $subsection = '';
		$template = 'index';
	}

	// Generate HTML from Markdown + SmartyPants and feed it to Haml:
	$content = SmartyPants(Markdown(file_get_contents(CONTENT_PATH . '/' . $section . $subsection . $page . '.txt')));

	// display_haml(TEMPLATE_PATH . '/' . $template . '.haml', array($site, $content), HAML_TEMP_PATH);
	include(TEMPLATE_PATH . '/' . $template . '.php');
}
?>
