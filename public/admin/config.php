<?php

// w2wiki configuration file
// edit this to your liking.  We'll even describe what you should do!
// This is a PHP source file.  Pay heed to match quotes and parentheses. All PHP statements must end with a semicolon.
// Comments are any line that begins with two slashes.

// each setting is a DEFINE statement, in the form of define(settingname, value);
// don't change the settingname part, just the value part.
// String values should be enclosed in single quotes '' or double quotes ""
// Boolean values should be specified as true or false (without quotes around them)

// *** Site path settings ***
// The base system path to w2wiki.  You shouldn't have to change this.
// Value is a string, ostensibly a directory path...
define('BASE_PATH', getcwd());					// Omit any trailing slash

// The base URI path to w2wiki.  You should change this!
// Value is a string, a well-formed URI to be precise.
define('BASE_URI', 'http://yark_admin.dev'); // Omit any trailing slash

// The name of the page to show as the "Home" page.
// Value is a string, the title of a page (case-sensitive!)
define('DEFAULT_PAGE', 'Home');

// The CSS file to load to style the wiki.
// You can take the default, modify it, and save it under a new name in this directory - then change the value below.
// Value is a string, the name and/or relative filesystem path to a CSS file.
define('CSS_FILE', 'index.css');

// *** File upload settings ***
// Whether or not to allow file uploading
// Value is a boolean, default false
define('DISABLE_UPLOADS', false);

// the file types we accept for file uploads.  This is a good idea for security.
// Value is a comma-separated string of MIME types.
define('VALID_UPLOAD_TYPES', 'image/jpeg,image/pjpeg,image/png,image/gif,application/pdf,application/zip,application/x-diskcopy');

// the filename extensions we accept for file uploads
// Value is a comma-separated string of filename extensions (case-sensitive!)
define('VALID_UPLOAD_EXTS', 'jpg,jpeg,png,gif,pdf,zip,dmg');

// *** Interface settings ***
// The format to use when displaying page modification times.
// See the manual for the PHP 'date()' function for the specification: http://php.net/manual/en/function.date.php
define('TITLE_DATE', 'r');

// Define the size of the text area in terms of character rows and columns.
// Values are integers.
define('EDIT_ROWS', 18);
define('EDIT_COLS', 40);

// *** Authentication settings ***
// Is a password required to access this wiki?
// Value is a boolean.
define('REQUIRE_PASSWORD', true);

// The password for the wiki.
// Value is a string.
define('W2_PASSWORD', 'secret');

?>
