<?php
if (!defined('ABSPATH')) {
  exit;
}

// Replace the permalink with the custom field value
function mlnc_advert_replace_post_permalink( $url, $post ){
  if( !is_object( $post ) )
    $post = get_post( $post_id );
    
  //$replace = $post->post_name;
    
  if (get_field('advert_external_url',$post->ID)) {
    $replace = get_field('advert_external_url',$post->ID);
    $url = $replace;
  }
  return $url;
}

add_filter( 'post_link', 'mlnc_advert_replace_post_permalink', 'edit_files', 2 );


// Display the impressions tag at the beginning of the content
add_filter('the_content', 'mlnc_add_impressionstag_before_content');
function mlnc_add_impressionstag_before_content($content) {

$impressions_tag = get_field('impressions_tag',$post->ID); //

if(is_single() && !is_home()) {
$content .= '<div style="width:1px;height:1px">'.$impressions_tag.'</div>';
}
return $content;
}