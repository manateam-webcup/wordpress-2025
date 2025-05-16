<?php
$search_terms = get_query_var( 'search_terms' );
if($search_terms === '') {
    $search_terms = array();
}

$content = get_the_content();
$content = strip_shortcodes($content);
$content = apply_filters( 'the_content', $content );
$content = preg_replace( '/\[.*?(\"title\":\"(.*?)\").*?\]/', '$2', $content );
$content = preg_replace( '/\[.*?(|title=\"(.*?)\".*?)\]/', '$2', $content );
$content = wp_strip_all_tags($content);
$content = preg_replace( '|\s+|', ' ', $content );

$cont = '';
$bFound = false;
$contlen = mb_strlen( $content );

foreach ($search_terms as $term) {
    $pos = 0;
    $term_len = mb_strlen($term);
    do {
        if ( $contlen <= $pos ) {
            break;
        }
        $pos = mb_stripos( $content, $term, $pos );
        if ( $pos ) {
            $start = ($pos > 150) ? $pos - 150 : 0;
            $temp = mb_substr( $content, $start, $term_len + 300 );
            $cont .= ! empty( $temp ) ? $temp . ' ... ' : '';
            $pos += $term_len + 150;
        }
    } while ($pos);
}

$cont = strip_shortcodes($cont);
$cont = wp_strip_all_tags($cont);

if( mb_strlen($cont) > 0 ){
    $bFound = true;
} else {
    $cont = mb_substr( $content, 0, $contlen < 300 ? $contlen : 300 );
    if ( $contlen > 300 ){
        $cont .= '...';
    }
    $bFound = true;
}

$pattern = "#\[[^\]]+\]#";
$replace = "";
$cont = preg_replace($pattern, $replace, $cont);

$cont = preg_replace('/('.implode('|', $search_terms) .')/iu', '<mark>\0</mark>', $cont);
$title = get_the_title();
$title = preg_replace( '/('.implode( '|', $search_terms ) .')/iu', '<mark>\0</mark>', $title );
?>

<div <?php post_class('standard-blog-item-wrapper'); ?>>
    <div class="blog-item">
        <?php
            if ( !empty(aiero_post_date_output()) || !empty(aiero_post_author_output()) ) {
                echo '<div class="post-meta-header">';
                    if ( !empty(aiero_post_date_output()) ) {
                        echo aiero_post_date_output(true);
                    }
                    if ( !empty(aiero_post_author_output()) ) {
                        echo aiero_post_author_output(true);
                    }
                echo '</div>';
            }

            if ( !empty(get_the_title()) ) {
                echo '<h3 class="post-title"><a href="' . esc_url(get_the_permalink()) . '">' . sprintf('%s', $title) . '</a></h3>';
            }

            echo '<div class="post-content">';
                echo wp_kses($cont, array(
                    'mark'  => array(),
                    'p'     => array()
                ));
            echo '</div>';

            if ( !empty(aiero_post_tags_output()) ) {
                echo aiero_post_tags_output(', ');
            }

            echo '<div class="post-more-button">';
                echo '<a href="' . esc_url(get_the_permalink()) . '">';
                    echo '<span>' . esc_html__('Read More', 'aiero') . '</span>';
                    echo '<svg viewBox="0 0 13 20"><polyline points="0.5 19.5 3 19.5 12.5 10 3 0.5" /></svg>';
                echo '</a>';
            echo '</div>';
        ?>
    </div>
</div>