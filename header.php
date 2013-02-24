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
    <link href="/wp-content/themes/sonen/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link href="/wp-content/themes/sonen/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link type="text/css" rel="stylesheet" href="http://fast.fonts.com/cssapi/f8722534-e446-4713-a3e7-e8740c853260.css" />

    <?php /* Importerer stilarkene */ ?>
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/style.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/top.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/twitter.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/single.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/preview.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/footer.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/author.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/events.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/menu.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/blogroll.less" />
    <link rel="stylesheet/less" type="text/css" href="/wp-content/themes/sonen/less/responsive.less" />


    <?php /* Importerer less-stilarkene: må importeres _før_ skriptet less.js */ ?>
    <!--
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/top.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/twitter.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/single.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/preview.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/footer.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/menu.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/events.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/blogroll.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/author.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/sonen/css/responsive.css" />
    -->


    <?php
    /* Inkluderer og konfigurerer less.js for utvikling: dette må skje _etter_ inkludering av *.less-filer */ ?>
    <script src="/wp-content/themes/sonen/js/less.js" type="text/javascript"></script>
    <?php /* Sørger for at less ikke sparer stilarkene i 'local storage' */ ?>
    <script type="text/javascript">less.env = "development";</script>
    <script>localStorage.clear(); </script>

</head>


<?php /* Bestemmer stilklassene til body-taggen */ ?>
<body <?php body_class(); ?>>

<?php get_sidebar('top'); ?>
