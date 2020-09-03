<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Soup
 */

?>

<article id="post-<?php the_ID(); ?>" class="post single">
	<?php if(has_post_thumbnail()): ?>
	    <div class="post-image bg-parallax">
			<?php the_post_thumbnail(); ?>
	    </div>
    <?php else: ?>
        <div class="post-notimage"></div>
	<?php endif; ?>
    <div class="container container-md">
        <div class="post-content">
            <ul class="post-meta">
                <li><?php soup_posted_on(); ?></li>
                <li><?php esc_html_e('by','soup'); ?> <?php the_author(); ?></li>
            </ul>
            <h1 class="post-title"><?php the_title(); ?></h1>
            <hr>
            <?php the_content(); 
            wp_link_pages( array(
                'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'soup' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            ) ); 

            global $numpages;
            if ( is_singular() && $numpages > 1 ) {
                if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    the_post_navigation( array(
                      'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'soup' ),
                    ) );
                } elseif ( is_singular( 'post' ) ) {
                    // Previous/next post navigation.
                    the_post_navigation( array(
                      'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'soup' ) . '</span> ' .
                        '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'soup' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                      'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'soup' ) . '</span> ' .
                        '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'soup' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                    ) );
                }
            }
            ?> 
            <?php  
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?> 
        </div>
    </div>
</article>