<?php
function display_page($site, $section, $sub_section, $page, $template)
{
	// If there is a section or sub-section, add a trailing slash.
    if (!empty($section))     $section     += '/';
    if (!empty($sub_section)) $sub_section += '/';

	// Generate HTML from Markdown + SmartyPants and feed it to Haml:
	$content = SmartyPants(Markdown(file_get_contents(CONTENT_PATH . '/' . $section . $sub_section . $page . '.txt')));

	// display_haml(TEMPLATE_PATH . '/' . $template . '.haml', array($site, $content), HAML_TEMP_PATH);
	include(TEMPLATE_PATH . '/' . $template . '.php');
}
?>