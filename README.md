# wp-advertorial-helper-fields
This plugin adds a field where you can add external url's to replace wp permalink &amp; an impressions tag field where you can add the impressions tag (usually an 1x1 px image)

The custom fields are created automatically but you'll need advance custom fields plugin tobe installed

Using the `post_link` filter we can replace the default permalink with the content of our custom field

```
function mlnc_advert_replace_post_permalink( $url, $post ){
  if( !is_object( $post ) )
    $post = get_post( $post_id );
    
  if (get_field('advert_external_url',$post->ID)) {
    $replace = get_field('advert_external_url',$post->ID);
    $url = $replace;
  }
  return $url;
}

add_filter( 'post_link', 'mlnc_advert_replace_post_permalink', 'edit_files', 2 );
```
To add the impressions tag field at the end of the content we can use the `the_content` wp filter


```
// Display the impressions tag at the beginning of the content
add_filter('the_content', 'mlnc_add_impressionstag_before_content');
function mlnc_add_impressionstag_before_content($content) {

$impressions_tag = get_field('impressions_tag',$post->ID); //

if(is_single() && !is_home()) {
$content .= '<div style="width:1px;height:1px">'.$impressions_tag.'</div>';
}
return $content;
}
