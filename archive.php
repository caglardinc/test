<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Soup
 */
 
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

	        <!-- Page Content -->
	        <div class="page-content bg-light">

	            <div class="container clearfix">
	                <div class="main left <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'fw' : ''; ?>">
						<?php
						if ( have_posts() ) :  
							/* Start the Loop */
							while ( have_posts() ) : the_post(); 
								get_template_part( 'template-parts/content' ); 
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
		                <div class="sidebar right">
		                	<?php get_sidebar(); ?> 
		                </div>
		            <?php endif; ?>
	            </div>
	            
	        </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
