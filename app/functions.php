<?php
function find_template($section)
{
	$php_exists = $haml_exists = false;
	if (file_exists(TEMPLATE_PATH . '/' . $section . '.php'))  $php_exists  = true;
	if (file_exists(TEMPLATE_PATH . '/' . $section . '.haml')) $haml_exists = true;

	// Determine which template to use
	switch (SITE_TEMPLATE_TYPE) {
		case 'php':
			if ($php_exists) {
				// PHP template exists -- use it.
				$template['type'] = 'php';
				$template['name'] = $section;
			} elseif ($haml_exists) {
				// Wanted PHP, but it's not there and the Haml is -- use it instead.
				$template['type'] = 'haml';
				$template['name'] = $section;
			} else {
				// No template found.  Falling back to base PHP template.
				$template['type'] = 'php';
				$template['name'] = 'base';
			}
			break;
		case 'haml':
			if ($haml_exists) {
				// Haml template exists -- use it.
				$template['type'] = 'haml';
				$template['name'] = $section;
			} elseif ($php_exists) {
				// Wanted Haml, but it's not there and the PHP is -- use that instead.
				$template['type'] = 'php';
				$template['name'] = $section;
			} else {
				// No template found.  Falling back to base Haml template.
				$template['type'] = 'haml';
				$template['name'] = 'base';
			}
			break;
	}

	return $template;
}

function find_page($section, $subsection, $page)
{
	$page_path = '';
	
	// If there is a section or sub-section, add a trailing slash.
	if (!empty($section))    $section    .= '/';
	if (!empty($subsection)) $subsection .= '/';
	
	$page_path = $section . $subsection . $page;

	// Check to see if the page exists
	if (!file_exists(CONTENT_PATH . '/' . $page_path . '.txt')) {
		$page_path = 'errors/404';
		// TODO Send proper 404 header
		// $template = 'error';
	}
	
	return $page_path;
}

function display_page($section, $subsection, $page, $template, $page_path)
{
	// Load the debug panel
	if (SITE_DEBUG) {
		$const = get_defined_constants();
		// Because you can't use constants inside of heredoc strings
		// http://www.php.net/manual/en/language.types.string.php#74744
		$debug = <<<EOT
			<table>
				<tr><th>File:</th><td>${const['CONTENT_PATH']}/$page_path.txt</td></tr>
				<tr><th>Template:</th><td>${const['TEMPLATE_PATH']}/${template['name']}.${template['type']}</td></tr>
				<tr><th>Template Type:</th><td>${const['SITE_TEMPLATE_TYPE']} <small>(Defined in config.yaml)</small></td><td></td></tr>
				<tr><th>This Template:</th><td>${template['type']}</td></tr>
				<tr><th>Section:</th><td>$section</td></tr>
				<tr><th>Subsection:</th><td>$subsection</td></tr>
				<tr><th>Page:</th><td>$page</td></tr>
			</table>
EOT;
	}

	// Generate HTML from Markdown + SmartyPants
	$content = SmartyPants(Markdown(file_get_contents(CONTENT_PATH . '/' . $page_path . '.txt')));

	// Generate the page with PHP or Haml
	switch ($template['type']) {
		case 'php':
			include(TEMPLATE_PATH . '/' . $template['name'] . '.php');
			break;
		case 'haml':
			// Create $debug variable if it hasn't been set (debugging mode off)
			if (empty($debug)) $debug = '';
			$haml_array = array('title'    => SITE_TITLE,
			 					'subtitle' => SITE_TITLE,
								'content'  => $content);
			display_haml(TEMPLATE_PATH . '/' . $template['name'] . '.haml', array('content' => $content, 'debug' => $debug), HAML_TEMP_PATH);
			break;
	}
}
?>
