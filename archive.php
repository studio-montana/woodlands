<?php
/**
 Theme Name: Woodlands
 Theme URI: http://lab.studio-montana.com/woodlands-theme/
 Author: Studio Montana (Sebastien Chandonay / Cyril Tissot)
 Author URI: http://www.studio-montana.com
 License: GNU General Public License v2 or later
 License URI: http://www.gnu.org/licenses/gpl-2.0.html

 This theme, like WordPress, is licensed under the GPL.
 Use it to make something cool, have fun, and share what you've learned with others.
 */

get_header();?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><i class="icon-book"></i><?php
					if ( is_day() ) :
						printf( __('Archives %s', 'woodlands'), get_the_date() );
					elseif ( is_month() ) :
						printf( __('Archives %s', 'woodlands'), get_the_date( _x('F Y', 'monthly archives date format', 'woodlands') ) );
					elseif ( is_year() ) :
						printf( __('Archives %s', 'woodlands'), get_the_date( _x('Y', 'yearly archives date format', 'woodlands') ) );
					else :
						_e('Archives', 'woodlands');
					endif;
				?></h1>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('content', 'resume'); ?>
			<?php endwhile; ?>
			
			<?php // Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'woodlands'),
				'next_text'          => __( 'Next page', 'woodlands'),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'woodlands') . ' </span>',
				)); ?>

		<?php else : ?>
			<?php get_template_part('content', 'none'); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
