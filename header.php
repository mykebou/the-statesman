<!DOCTYPE html>

<!--
Join The Statesman Web & Graphics Section: https://www.facebook.com/groups/1481474198792246/
-->

<html <?php language_attributes(); ?>>
	<head>
		<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" />
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo( 'template_url' ); ?>/apple-touch-icon.png" />
		<meta name="viewport" content="width=device-width">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/web-and-graphics.js"></script>
		<title>
		<?php
				// Print the <title> tag based on what is being viewed.
				global $page, $paged;

				wp_title( '|', true, 'right' );

				// Add the blog name.
				bloginfo( 'name' );

				// Add the blog description for the home/front page.
				$site_description = get_bloginfo( 'description', 'display' );
				if ( $site_description && ( is_home() || is_front_page() ) )
					echo " | $site_description";

				// Add a page number if necessary:
				if ( $paged >= 2 || $page >= 2 )
					echo ' | ' . sprintf( 'Page %s', max( $paged, $page ) );
		?>
		</title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
		<![endif]-->

		<!--Twitter meta tags-->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@sbstatesman">
		<meta name="twitter:title" content="<?php the_title(); ?>">
		<meta name="twitter:description" content="<?php get_excerpt(); ?>">
		<meta name="twitter:image" content="<?php echo get_ogimg(); ?>">
		<!--Facebook meta tags-->
		<meta property="og:title" content="<?php the_title(); ?>"/>
		<meta property="og:type" content="<?php if (is_single() || is_page()) { echo 'article'; } else { echo 'website';} ?>"/>
		<meta property="og:image" content="<?php echo get_ogimg(); ?>"/>
		<meta property="og:url" content="<?php the_permalink(); ?>"/>
		<meta property="og:description" content="<?php get_excerpt(); ?>"/>
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
		<meta property="article:publisher" content="https://www.facebook.com/sbstatesman" />
		<meta property="article:author" content="<?php echo get_author_posts_url($post->post_author); ?>"/>
		<meta property="fb:app_id" content="240206602837517" />
		<!--General meta tags-->
		<meta name="description" content="<?php get_excerpt(); ?>"/>
		<meta name="application-name" content="The Statesman" />
		<meta name="author" content="<?php the_author_meta('display_name',$post->post_author); ?>"/>

		<?php wp_head(); ?>
	</head>
	<body>
		<nav class="fixednav fixednav-main">
			<div class="container">
				<a href="<?php echo site_url(); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/nav-logo.png" class="logo" alt="The Statesman" width="162" height="20" /></a>
				<ul class="horizontallist">
					<li><a href="<?php echo get_category_link(4); ?>">News</a></li>
					<li><a href="<?php echo get_category_link(15); ?>">Arts &amp; Entertainment</a></li>
					<li><a href="<?php echo get_category_link(20); ?>">Opinions</a></li>
					<li><a href="<?php echo get_category_link(14); ?>">Sports</a></li>
					<li><a href="<?php echo get_category_link(163); ?>">Multimedia</a></li>
					<li><a href="<?php echo get_page_link(18318); ?>">About</a></li>
				</ul>
				<?php get_search_form(); ?>
				<!--<span class="iconbar iconbar-search"></span>
				<input type="text" class="search" placeholder="search" />-->
			</div>
		</nav>
		<div class="container">