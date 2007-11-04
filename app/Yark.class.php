<?php

class Yark
{
	public $site;
	public $section;
	public $sub_section;
	public $page;
	public $template;
	
	function __construct()
	{
		$this->site = Spyc::YAMLLoad(BASE_PATH . '/config.yaml');
		$section     = (isset($_GET['section']))     ? $_GET['section']     : '';
		$sub_section = (isset($_GET['sub_section'])) ? $_GET['sub_section'] : '';
		$page        = (isset($_GET['page']))        ? $_GET['page']        : '';
	}
	
	public function DisplayPage($page, $template)
	{
	    if (!empty($section))     $section     += '/';
	    if (!empty($sub_section)) $sub_section += '/';

		// Generate HTML from Markdown + SmartyPants and feed it to Haml:
		$content = SmartyPants(Markdown(file_get_contents(CONTENT_PATH . '/' . $section . $sub_section . $page . '.txt')));

		display_haml(TEMPLATE_PATH . '/' . $template . '.haml', array($site, $content), HAML_TEMP_PATH);
		// include(TEMPLATE_PATH . '/' . $template . '.php');
	}
	
	public function PageExists()
	{
	}
}


// TODO: Get path from URL, check for file in /content folder (page_name)
// TODO: somehow determine which template to use to render it (template_name)

// Load $_GET variabes, if any.

/*
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
*/
?>