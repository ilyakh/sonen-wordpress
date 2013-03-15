<!DOCTYPE html>

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
    <!--[if !IE 7]>
    <style type="text/css">
        #wrap {display:table;height:100%}
    </style>
    <![endif]-->
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( '/', true, 'right' ); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    


    <?php wp_head(); ?>


    <!-- bootstrap -->
    <link href="/wp-content/themes/sonen/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link href="/wp-content/themes/sonen/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">

    <!-- production fonts -->
    <link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/7afc5603-5dee-46a4-89bc-80b86d8a7da2.css"/>

    <!-- stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/top.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/information.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/twitter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/single.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/preview.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/footer.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/author.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/events.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/menu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/blogroll.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.css" />

    <!-- transparency fix -->
    <!--[if IE 8]>
    <style type="text/css">
        .title-overlay { background-color: #111111; }
    </style>
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

</head>



<body <?php body_class(); ?>>

<div class="logo">
    <?php get_sidebar('top'); ?>
</div>

<!-- horizontal left -->
<div id="horizontal-left" class="horizontal span4">
    <?php if ( has_nav_menu('first') ) : ?>
    <div class="row-fluid">
        <?php wp_nav_menu( array( 'theme_location' => 'first', 'menu' => 'first' ) ); ?>
    </div>
    <?php endif; ?>
    <div class="row-fluid">
        <?php dynamic_sidebar('top'); ?>
    </div>
    <div class="row-fluid">
        <?php dynamic_sidebar('left-top'); ?>
    </div>
    <?php if ( has_nav_menu('second') ) : ?>
    <div class="row-fluid">
        <?php wp_nav_menu( array( 'theme_location' => 'second', 'menu' => 'second' ) ); ?>
    </div>
    <?php endif; ?>
    <div class="row-fluid">
        <?php dynamic_sidebar('left-center'); ?>
    </div>
    <?php if ( has_nav_menu('third') ) : ?>
    <div class="row-fluid">
        <?php wp_nav_menu( array( 'theme_location' => 'third', 'menu' => 'third' ) ); ?>
    </div>
    <?php endif; ?>
    <div class="row-fluid">
        <?php dynamic_sidebar('left-bottom'); ?>
    </div>
    <div class="row-fluid">
        <div class="segl">
            <a href="http://uio.no/"><img src="/wp-content/themes/sonen/img/segl.png" alt="" style="z-index: 10;" /></a>
        </div>
    </div>
</div>

<!-- horizontal right -->
<div id="horizontal-right" class="horizontal visible-desktop">
    <?php dynamic_sidebar('horizontal-right'); ?>

    <div class="service-bar">
        <div class="service">
            <a href="https://www.facebook.com/ifisonen">
                <img src="/wp-content/themes/sonen/img/facebook-white.png" alt="" />
            </a>
        </div>

        <div class="service">
            <a href="http://www.reddit.com/r/sonen/">
                <img src="/wp-content/themes/sonen/img/reddit-white.png" alt="" />
            </a>
        </div>

        <div class="service">
            <a href="https://twitter.com/UniOslo_Sonen">
                <img src="/wp-content/themes/sonen/img/twitter-white.png" alt="" />
            </a>
        </div>

        <div class="service">
            <a href="http://www.uio.no/">
                <img src="/wp-content/themes/sonen/img/uio_white.png" alt="" />
            </a>
        </div>
    </div>
</div>


<div id="content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span12 previews">
