<?php
/**
 * @package WordPress
 * @subpackage Woodland
 * @version 2.0
 * @author Sébastien Chandonay www.seb-c.com / Cyril Tissot www.cyriltissot.com
 * This file, like this theme, like WordPress, is licensed under the GPL.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-page'); ?>>
	<header class="entry-header">
		<?php if (!post_password_required()){ ?>
			<?php 
			if (function_exists('woodkit_display_thumbnail')){
				woodkit_display_thumbnail(get_the_ID(), 'post-content');
			}else if (has_post_thumbnail()){
				?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail('post-content'); ?>
				</div>
			<?php }
		} ?>

		<?php
		if (function_exists('woodkit_display_title')){
			woodkit_display_title();
		}else{
			?><h1 class="entry-title"><?php the_title(); ?></h1><?php
		} ?>
		
		<?php
		if (function_exists('woodkit_display_subtitle')){
			woodkit_display_subtitle();
		} ?>

		<div class="entry-meta">
			<?php
			if (function_exists('woodkit_entry_meta')){
				woodkit_entry_meta();
			} ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	
	<?php if (function_exists("woodkit_pagination")) woodkit_pagination(array(), true, '<div class="pagination">', '</div>', '<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'); ?>	

	<footer class="entry-meta">
		<?php if (is_single() && get_the_author_meta('description') && is_multi_author()) : ?>
			<?php get_template_part('author-bio'); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
