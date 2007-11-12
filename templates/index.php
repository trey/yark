<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title><?php echo SITE_TITLE . ': ' . SITE_SUBTITLE; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="/css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="/css/home.css" type="text/css" media="all">
	<?php if (SITE_DEBUG == 'true'): ?><link rel="stylesheet" href="/css/debug.css" type="text/css" media="all"><?php endif ?>
	<!--[if lte IE 7]><link rel="stylesheet" href="/css/iewin.css" type="text/css" media="screen"><![endif]-->
</head>
<body>
	<?php if (SITE_DEBUG == 'true') {
		echo '<div id="debug">';
		echo $debug;
		echo '</div>';
	} ?>
	<div id="wrapper">
		<div id="main">	
			<?php echo $content; ?>
		</div><!-- #main -->
	</div><!-- #wrapper -->
</body>
</html>