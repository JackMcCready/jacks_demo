<!DOCTYPE HTML>
<html>
<head>
	<title><?php the_title() ?></title>
	<meta charset="UTF-8">
	<meta name="url" content="<?php the_permalink(); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="https://use.typekit.net/qod1zyt.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/production.css">
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/production.js"></script>

	<?php
	wp_head();
	?>
</head>
<body class="<?php the_title(); ?>-page">
	<div id="header">
		<div class="container" style="padding: 15px 0;">
			<div class="row">
				<div class="flex center-flex header-inner-wrap col-md-12">
					<div class="company-name">
						<div class="name-wrap">
						<?php the_field('company_name', 'option'); ?>
						</div>
					</div>
					<div class="mobile-nav">
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="nav-bar">
						<div id="navigation">
							<div class="mobile-navigation">
								<?php wp_nav_menu( array('menu' => 'Mobile Menu')); ?>
							</div>
							<div class="standard-nav">
								<?php wp_nav_menu( array('menu' => 'Main Menu') ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="banner">
		<div class="banner-image" style='background-image: url(<?php the_field('banner_image'); ?>); height:<?php the_field('banner_height'); ?>;'>
			<div class="title">
				<?php if(!is_front_page()){ ?>
					<p> <?php global $post; echo $post->post_title; ?> </p>
				<?php } ?>

				<?php if(is_front_page()) { ?>
					<p> <?php the_field('company_name', 'option'); ?> </p>
				<?php } ?>
			
			</div>
		</div>
	</div>
	<div id="page">