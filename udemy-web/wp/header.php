<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>

	<?php if(is_single()): ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/single.css" type="text/css">
	<?php else: ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css">
	<?php endif; ?>

	<?php
	wp_enqueue_script('jquery');
	wp_head(); 
	?>
</head>

<body <?php body_class(); ?>>

<div class="adminOnly">
<?php
		echo "<pre>";
		wp_title('', true, '');
		$blogInformation = [
			'name' => get_bloginfo('name'),
			'description' => get_bloginfo('description'),
			'wpurl' => get_bloginfo('wpurl'),
			'url' => get_bloginfo('url'),
			'admin_email' => get_bloginfo('admin_email'),
			'charset' => get_bloginfo('charset'),
			'version' => get_bloginfo('version'),
			'html_type' => get_bloginfo('html_type'),
		];
		print_r($blogInformation);

		body_class();

		if (have_posts()) :
			echo "記事はありまーす!!!!";
			while(have_posts()):
				the_post();
				echo "<p>";
				the_title();
				echo "</p>";
			endwhile;
		endif;

		echo "</pre>";
	?>
</div>

	<header class="header_head">
		<div id="header_inner">
			<h1>
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="DESIGN LEAKER">
				</a>
			</h1>
			<!-- <nav>
				<ul>
					<li><a href="#">ウェブデザイン</a></li>
					<li><a href="#">WORDPRESS</a></li>
					<li><a href="#">jQuery</a></li>
					<li><a href="#">ウェブマーケティング</a></li>
				</ul>
			</nav> -->

			<nav class="globalNavi">
				<?php
				$args = array(
					'menu' => 'global-navigation',
					'container' => false,
				);
				wp_nav_menu($args);
				?>
			</nav>
			<!-- <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/"> -->
			<?php if(function_exists('bcn_display'))
			{
					// bcn_display();
			}?>
			<!-- </div> -->
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				// yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?>

		</div>

	</header>

	<?php 
		if( function_exists('d4isk_breadCrumb')) {
			d4isk_breadCrumb('<div id="d4breadcrumbs">', '</div>');
		}
	?>