<?php

/**
 * Template defaultTemplate posts
 * @package WordPress
 * @subpackage I'LL
 * @since I'LL 1.0
 */

get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/asset/css/defaultTemplate.css">

<article class="defaultTemplate">
	<div class="inner">
		<?php while (have_posts()) : the_post(); ?>
			<div class="defaultTemplate__header">

				<div class="defaultTemplate__title">
					<h1><?php the_title(); ?></h1>
				</div>

				<?php if (has_post_thumbnail() && $page_thumbnail_layout != 'no_display' && !$none_display_thumbnail) : ?>
					<figure class="defaultTemplate__thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>">
					</figure>
				<?php endif; ?>
			</div>

			<section class="defaultTemplate__contents">
				<?php the_content(); ?>
			</section>

			<?php if ($display_mobile_footer_page && is_mobile()) : ?>
				<?php ill_mobile_footer_buttons_page(); ?>
				<?php ill_mobile_footer_buttons_modal_window(); ?>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>
</article>

<?php get_footer(); ?>
