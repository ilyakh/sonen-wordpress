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
		<div class="span3">
			<div class="logo-container">
				<a href="<?php bloginfo('url'); ?>">
					<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
				</a>
			</div>
		</div>
		<div class="span9">
			<div class="menu-container">
				<!-- main menu -->
				<ul class="nav nav-pills">
				  <li class="active">
					<a href="#">HOVEDSIDE</a>
				  </li>
				  <li><a href="#">PROSJEKTER</a></li>
				  <li><a href="#">ARTIKLER</a></li>
				  <li><a href="#">WIKI</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="frame">	
	<div class="row-fluid frame">
		<div class="span12 frame-element content">