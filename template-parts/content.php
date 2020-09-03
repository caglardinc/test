<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Soup
 */
$soup_img_clas = "blogfwd";
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post post-wide animated'); ?> data-animation="fadeIn">
	<?php if(has_post_thumbnail()): ?>
    	<div class="post-image"><?php the_post_thumbnail(); ?></div>
    <?php  $soup_img_clas = "";
	endif; ?>
    <div class="post-content <?php echo esc_attr($soup_img_clas); ?>">
        <ul class="post-meta">
            <li><?php soup_posted_on(); ?></li>
            <li><?php esc_html_e('by','soup'); ?> <?php the_author(); ?></li>
            <?php if ( is_sticky() ) {
                printf( '<span class="dashicons dashicons-admin-post sticky-icon"></span> <span class="font-10 letter-spacing-1 post-date mar-right-10"> %s </span>', esc_html__( 'Sticky ', 'soup' ) );
            } ?> 
        </ul>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <p><?php the_excerpt(); ?></p> 
    </div>
</article><!-- #post-## --> 
