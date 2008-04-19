W2: Simple web notes
====================

Copyright (C) 2007 Steven Frank <http://stevenf.com/>
Additional acknowledgements at bottom of file.


Design Goals
------------

1. Extremely compact (only three PHP files and one CSS file)
2. Minimal execution time, for quickest possible mobile access (iPhone!)
3. Very simple, easy-to-read code
4. Elegant markup syntax for notes, with linking and image support
5. Easily customizable appearance via CSS
6. Storage as plain text files (no database required)
7. Generates clean XHTML output in most cases


Installation
------------

1. Create a directory for W2 somewhere in your web server's document 
   root path.  It doesn't matter where.  W2 requires PHP 4 or higher.
   
2. Upload the W2 files to this directory.  When you're done, it should
   look something like this:
   
   w2/
       index.css 
       index.php
       config.php
       markdown.php
       images/
       pages/
           Home.txt
           Markdown Syntax.txt
       
3. Make sure that the "images" and "pages" directories are writable by your
   web server process.
   
4. Edit the following line in config.php to match your server configuration:
   
   define(BASE_URI, 'http://stevenf.com/w2');	
   
   Leave trailing slashes off.

You should now be ready to access your W2 installation.


Basic Usage
-----------

While viewing a page:

  [Edit] edits the current page content.

  [New] creates a brand new page for you to edit.

  [Upload] allows you to upload an image to the images/ directory for later
  use with the {{image}} tag.  (see "Editing Syntax" below for more info)

  [All] shows you a list of all pages.	

  [Home] returns you to the Home page.

  The search box performs a very simple brute-force search of the contents 
  of all pages.


Editing Syntax
--------------

Please refer to the Markdown Syntax:

  <http://daringfireball.net/projects/markdown/syntax>

Two additional syntax features have been added:

  [[Page Name]] 
      Double square brackets will insert a link to the named page.
      
  {{ImageName.jpg}}
      Double curly brackets will insert the named image from the 
      images/ directory.


Optional Configuration
----------------------

The following line in config.php may be changed if you do not want the 
default page to be named 'Home':

  define('DEFAULT_PAGE', 'Home');

The following line in config.php may be changed if you'd like to use a
different CSS stylesheet:

  define('CSS_FILE', 'index.css');

To control the format of the page timestamp, change the value of:

  define('TITLE_DATE', 'r');

PHP date & time format is used - see http://php.net/manual/en/function.date.php
To disable the page timestamp completely, put two slashes at the beginning
of the line.

The size of the edit textarea is controlled by:

  define('EDIT_ROWS', 18);
  define('EDIT_COLS', 40);

W2 has the ability to prompt for a password before allowing access to the
site.  Two lines in config.php control this:

  define('REQUIRE_PASSWORD', false);
  define('W2_PASSWORD', 'secret');

Set REQUIRE_PASSWORD to true and set W2_PASSWORD to the password you'd like
to use.

License
-------

You may re-use the source code to W2 for any purpose, as long as you retain 
the copyright information from the beginning of this file.  Markdown and PHP
Markdown have their own license terms, which must also be observed.  You may 
not use the names "W2" or "Steven Frank" to endorse or promote your product 
without written permission from Steven Frank.

Absolutely no warranty is provided.


Reporting Bugs
--------------

Please send bug reports and feature requests to:

  <stevenf@panic.com>


Acknowledgements
----------------

PHP Markdown
  Copyright (c) 2004-2007 Michel Fortin  
  <http://www.michelf.com/projects/php-markdown/>

Original Markdown
  Copyright (c) 2004-2006 John Gruber  
  <http://daringfireball.net/projects/markdown/>

Other Contributions
  Craig Hockenberry
  Dan Sandler
  pcdinh
  Victor Rehorst (chuma@chuma.org)
  abhibeckert
  And others!  Thank you!
  
  
  
History
-------

1.0.2 (September 5, 2007)

  - 'All Pages' can now be sorted by title or last modified date (vrehorst)
  - Added list of valid upload MIME types and file extensions (abhibeckert)
  - Added config settings to change textarea size (vrehorst)
  - Added page timestamp display support (vrehorst)
  - Added simple authentication mechanism (stevenf, vrehorst)

1.0.1 (July 16, 2007)
  
  - Added style selectors to toolbar links for easier styling
  - Added support for "cruftless URLs" (index.php/MyPage instead 
    of index.php?page=MyPage)
  - Separated configuration options into their own file for
    easier updating of the main code
  - Added implementation of file_put_contents() for PHP 4
  - Added cache-overriding and improved viewport headers for 
    better iPhone support
  - Added configuration variable for selecting a different CSS file
  - Streamlined sanitize() function and renamed to sanitizeFilename()
    to better indicate its purpose
  - Upload link now hides if uploading is disabled
  - Possibly other small things I forgot about!

1.0 (July 13, 2007)

  - Initial release!