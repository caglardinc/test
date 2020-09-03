<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Soup
 */

if(is_page()){
	$soup_pg_sidbr = get_post_meta(get_the_ID(),'_soup_post_sidebar',true);
}else{
	$soup_pg_sidbr = '';
}
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

	        <!-- Page Content -->
	        <div class="page-content <?php echo esc_attr(is_page() ? '' : 'bg-light'); ?>">

	            <div class="<?php echo esc_attr(($soup_pg_sidbr=='fulls') ? '' : 'container'); ?> clearfix">
	                <?php if( is_active_sidebar( 'sidebar-1' ) ): ?>
				      	<?php if($soup_pg_sidbr=='left'): ?> 
			                <div class="sidebar left">
			                	<?php get_sidebar(); ?> 
			                </div>
				      	<?php endif; ?>
			      	<?php endif; ?>
	                <div class="main <?php echo esc_attr(($soup_pg_sidbr=='fullw') ? 'fullw' : (($soup_pg_sidbr=='left') ? 'right' : 'left')); ?> <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'fw' : ''; ?>">
						<?php
						if ( have_posts() ) :  
							/* Start the Loop */
							while ( have_posts() ) : the_post(); 
								get_template_part( 'template-parts/content','page' ); 
							endwhile; 
						else : 
							get_template_part( 'template-parts/content', 'none' );
						endif; ?> 
	                    <!-- Pagination -->
	                    <nav aria-label="Page navigation" class="mt-5">
	                    	<?php soup_pagination(); ?> 
	                    </nav>
	                </div>
	                
	                <?php if( is_active_sidebar( 'sidebar-1' ) ): ?>
				      	<?php if( ($soup_pg_sidbr!='left') && ($soup_pg_sidbr!='fullw')  && ($soup_pg_sidbr!='fulls') ): ?>
			                <div class="sidebar right">
			                	<?php get_sidebar(); ?> 
			                </div>
				      	<?php endif; ?>
			      	<?php endif; ?>
	            </div>
	            
	        </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();