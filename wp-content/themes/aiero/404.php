<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<!-- Body -->
<body <?php body_class(); ?>>

    <div class="error-404-wrapper">
        <div class="error-404-container">
            <div class="error-decoration-tl">
                <div class="error-decoration-tl-inner">
                </div>
            </div>
            <div class="error-decoration-br">
                <div class="error-decoration-br-inner">
                </div>
            </div>
            <div class="error-decoration-bl">
                <div class="error-decoration-bl-inner">
                </div>
            </div>
            <div class="error-404-content">
                <?php
                    if ( aiero_get_prefered_option('error_logo_status') == 'on' && !empty(aiero_get_error_logo_output()) ) {
                        echo aiero_get_error_logo_output();
                    }
                    echo '<span class="error-404-text">404</span>';
                    if ( !empty(aiero_get_theme_mod('error_title')) ) {
                        echo '<h1 class="error-404-title">' . wp_kses(aiero_get_theme_mod('error_title'), array('br' => array())) . '</h1>';
                    }
                    if ( !empty(aiero_get_theme_mod('error_text')) ) {
                        echo '<p class="error-404-info-text">' . esc_html(aiero_get_theme_mod('error_text')) . '</p>';
                    }
                    if ( !empty(aiero_get_theme_mod('error_button_text')) ) {
                        echo '<div class="error-404-button">';
                            echo '<a class="error-404-home-button aiero-button" href="' . esc_url(home_url('/')) . '">' . esc_html(aiero_get_theme_mod('error_button_text')) . '<span class="icon-button-arrow"></span></a>';
                        echo '</div>';
                    }
                    if (aiero_get_theme_mod('error_socials_status') == 'on' && !empty(aiero_socials_output())) {
                        echo aiero_socials_output('wrapper-socials');
                    }
                ?>
            </div>
        </div>
    </div>

<?php
    wp_footer();
?>
</body>
</html>