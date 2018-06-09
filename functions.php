// Function Yektanet START

add_filter( 'the_content', 'prefix_insert_post_ads' );
 
function prefix_insert_post_ads( $content ) {
 
$ad_code1 = '<div class="yektanet">
<a rel="nofollow" target="_blank" href="ADS_URL"><figure><img src="thumbnail_url"></figure><span>ADS TEXT</span></a>
<a rel="nofollow" target="_blank" href="ADS_URL"><figure><img src="thumbnail_url"></figure><span>ADS TEXT</span></a>
</div>';
$ad_code2 = '<div class="yektanet">
<a rel="nofollow" target="_blank" href="ADS_URL"><figure><img src="thumbnail_url"></figure><span>ADS TEXT</span></a>
<a rel="nofollow" target="_blank" href="ADS_URL"><figure><img src="thumbnail_url"></figure><span>ADS TEXT</span></a>
</div>';



$ad_array = array($ad_code1,$ad_code2);
$ad_code = array_rand($ad_array);


     if ( is_single() && ! is_admin() ) {
        return prefix_insert_after_paragraph($ad_array[$ad_code],2,$content );
    }
    return $content;
}

function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
 
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
 
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
 
    return implode( '', $paragraphs );
}

// Function Yektanet END
