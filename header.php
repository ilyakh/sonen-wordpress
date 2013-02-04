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

$theme_uri = '/ny/wp-content/themes/sonen';

$files = array(
	/* bootstrap: responsive scafolding grid */
	'<link href="' . esc_url( home_url( '/' ) ) . 'wp-content/themes/sonen/css/bootstrap.min.css" rel="stylesheet" media="screen">',
	'<meta name="viewport" content="width=device-width, initial-scale=1.0">',
	'<link href="' . esc_url( home_url( '/' ) ) . 'wp-content/themes/sonen/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">',
	/* fonts */
	'<link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/f8722534-e446-4713-a3e7-e8740c853260.css" />'
);

$less = array( 
	/* less js stylesheets */
	'<link rel="stylesheet/less" type="text/css" href="' . esc_url( home_url( '/' ) ). 'wp-content/themes/sonen/less/style.less" />',
	/* less js script */
	'<script src="' . esc_url( home_url( '/' ) ) . 'wp-content/themes/sonen/js/less.js" type="text/javascript"></script>'
);

print( implode( "\n", $files ) );
print( "\n" );
print( implode( "\n", $less ) );

?>
</head>

<!-- BODY -->
<body <?php body_class(); ?>>

<!-- HEADER -->
<header>
    <div class="section">
        <?php $header_image = get_header_image();
        if ( ! empty( $header_image ) ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
        <?php endif; ?>
    </div>

    <div class="area">
        <div class="section">
            <div class="banner-content">
                <nav id="site-navigation" class="main-navigation">
                    <?php wp_nav_menu( array( 'container' => '' ) ); ?>
                </nav>
            </div>
        </div>
    </div>

</header>

<!-- Creates a borderless EVENT banner -->

<!-- HEADER: END -->

<!-- PAGE -->
<div class="page">