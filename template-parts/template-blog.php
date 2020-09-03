<?php
/**
 * Template Name: Blog
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Soup
 */
$soup_opt = new Soup();
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

	        <!-- Page Content -->
	        <div class="page-content bg-light">

	            <div class="container">
	                <div class="row">
	                    <div class="col-lg-10 push-lg-1">
							<?php
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
                            $soup_page_query = new WP_Query(array( 'post_type'=> 'post','paged' => $paged ));
							if ( $soup_page_query->have_posts() ) :  
								/* Start the Loop */
								while (  $soup_page_query->have_posts() ) :  $soup_page_query->the_post(); 
									get_template_part( 'template-parts/content' ); 
								endwhile; 
							else : 
								get_template_part( 'template-parts/content', 'none' );
							endif;   wp_reset_postdata(); ?> 
		                    <!-- Pagination -->
		                    <nav aria-label="Page navigation" class="mt-5">
		                    	<?php soup_pagination($soup_page_query->max_num_pages,"",$paged); ?> 
		                    </nav>
		                </div> 
		            </div> 
	            </div>
	            
	        </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
