<?php 
function divi__child_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'divi__child_theme_enqueue_styles' );

//DEFAULT CHANGES

//Enable SVG upload
function smartwp_enable_svg_upload( $mimes ) {
  //Only allow SVG upload by admins
  if ( !current_user_can( 'administrator' ) ) {
    return $mimes;
  }
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  
  return $mimes;
}
add_filter('upload_mimes', 'smartwp_enable_svg_upload');

// Put post thumbnails into rss feed
function wpfme_feed_post_thumbnail($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
    $content = '' . $content;
    }
    return $content;
    }
    add_filter('the_excerpt_rss', 'wpfme_feed_post_thumbnail');
    add_filter('the_content_feed', 'wpfme_feed_post_thumbnail');    



//DIVI CHANGES
    add_action( 'wp_head', function () { ?>
        
        <!-- make social icons open in new tab -->
        <script type="text/javascript">
        jQuery(document).ready(function($) {
        jQuery(".et-social-icon a").attr('target', 'blank');
        });
        </script>

        <!-- remove bullet points from footer css -->
        <style>
        #footer-widgets .footer-widget li:before {
        display:none;
    }
    
        #footer-widgets .footer-widget li {
        padding-left: 0px;
    }
    
        </style>
        <?php } );    