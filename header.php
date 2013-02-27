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
    <?php /* Konfigurerer dokumentet fra wordpress og twenty-twelve */ ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <?php wp_head(); ?>

    <?php /* Inkluderer prosjekt-spesifikke filer */ ?>
    <link href="/wp-content/themes/sonen2/css/bootstrap.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link href="/wp-content/themes/sonen2/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <!-- production fonts -->
    <!-- <link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/7afc5603-5dee-46a4-89bc-80b86d8a7da2.css"/> -->
    <!-- development fonts -->
    <link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/f8722534-e446-4713-a3e7-e8740c853260.css" />
    
	<?php /* Importerer less-stilarkene: må importeres _før_ skriptet less.js */ ?>
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/style.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/top.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/information.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/twitter.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/single.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/preview.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/footer.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/author.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/events.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/menu.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/blogroll.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen2/less/responsive.less" />

    <?php
    /* Inkluderer og konfigurerer less.js for utvikling: dette må skje _etter_ inkludering av *.less-filer */ ?>
    <script src="/wp-content/themes/sonen2/js/less.js" type="text/javascript"></script>
    <?php /* Sørger for at less ikke sparer stilarkene i 'local storage' */ ?>
    <script type="text/javascript">less.env = "development";</script>
    <script>localStorage.clear(); </script>

</head>



<body <?php body_class(); ?>>

<div class="logo">
    <?php get_sidebar('top'); ?>
</div>

<!-- horizontal left -->
<div id="horizontal-left" class="horizontal clearfix">
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
            <a href="http://uio.no/"><img src="/wp-content/themes/sonen2/img/segl.png" alt="" style="z-index: 10;" /></a>
        </div>
    </div>
</div>

<!-- horizontal right -->
<div id="horizontal-right" class="horizontal visible-desktop">
    <?php dynamic_sidebar('horizontal-right'); ?>

    <div class="service-bar">
        <div class="service">
            <a href="https://www.facebook.com/ifisonen">
                <img src="/wp-content/themes/sonen2/img/facebook-white.png" alt="" />
            </a>
        </div>

        <div class="service">
            <a href="http://www.reddit.com/r/sonen/">
                <img src="/wp-content/themes/sonen2/img/reddit-white.png" alt="" />
            </a>
        </div>

        <div class="service">
            <a href="https://twitter.com/UniOslo_Sonen">
                <img src="/wp-content/themes/sonen2/img/twitter-white.png" alt="" />
            </a>
        </div>

        <div class="service">
            <a href="http://www.uio.no/">
                <img src="/wp-content/themes/sonen2/img/uio_white.png" alt="" />
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
