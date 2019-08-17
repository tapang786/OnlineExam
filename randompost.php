function wpb_rand_posts() { 
$args = array(
    'post_type' => 'post',
    'orderby'   => 'rand',
    'posts_per_page' => 5, 
    );
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
$string .= '<ul>';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $string .= '<li><a href="'. get_permalink() .'">'. get_the_title() .'</a></li>';
    }
    $string .= '</ul>';
    /* Restore original Post Data */
    wp_reset_postdata();
} else {
$string .= 'no posts found';
}
return $string; 
} 
add_shortcode('ef_wd-random-posts','wpb_rand_posts');
add_filter('widget_text', 'do_shortcode'); 
