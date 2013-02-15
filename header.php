<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<?php

$theme_uri = '/wordpress-no/wp-content/themes/sonen';
$theme_uri = '/ny/wp-content/themes/sonen';

$files = array(
	/* bootstrap: responsive scafolding grid */
	'<link href="' . $theme_uri . '/css/bootstrap.min.css" rel="stylesheet" media="screen">',
	'<meta name="viewport" content="width=device-width, initial-scale=1.0">',
	'<link href="' . $theme_uri . '/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">',
	/* fonts */
	'<link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/f8722534-e446-4713-a3e7-e8740c853260.css" />',
    '<script src="' . $theme_uri . '/js/jquery.js" type="text/javascript"></script>',
    '<script src="' . $theme_uri . '/js/tagcloud.js" type="text/javascript"></script>',
);

$less = array( 
	/* less js stylesheets */
	'<link rel="stylesheet/less" type="text/css" href="' . $theme_uri . '/less/style.less" />',
	/* less js script */
	'<script src="' . $theme_uri . '/js/less.js" type="text/javascript"></script>'
);

print( implode( "\n", $files ) );
print( "\n" );
print( implode( "\n", $less ) );

?>
</head>

<body <?php body_class(); ?>>

<div class="area"><?php get_sidebar('top-right'); ?></div>
<div class="hfeed site">
    <?php get_sidebar('content-header'); ?>