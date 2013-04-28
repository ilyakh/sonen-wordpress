<!DOCTYPE html>
<html>

<head>
    <title>Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo get_template_directory_uri(); ?>/css/project.css" rel="stylesheet" media="screen">
	<?php wp_head(); ?>
</head>

<body <?php body_class(''); ?> style="background-size: 100%; background-repeat: no-repeat; background-attachment: fixed;">
<!--
style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/banner.jpg')" -->


<div class="header">
	<div class="row-fluid">
		<div class="span6">
		<a href="<?php bloginfo('url'); ?>">
			<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
		</a>
		</div>
		<div class="span6"><!--
			<a href="http://uio.no/">
				<img src="http://sonen.ifi.uio.no/wp-content/themes/sonen/img/segl.png" alt="" class="pull-right" />
			</a>-->
		</div>
	</div>
</div>

<div class="frame">	
	<div class="row-fluid frame">
		<div class="span12 frame-element content">