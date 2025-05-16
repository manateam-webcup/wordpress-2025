            <?php
                defined( 'ABSPATH' ) or die();

                if ( aiero_get_prefered_option('footer_status') == 'on' ) {

                    $footer_classes = 'footer';
                    $footer_wrapper_classes = 'footer-wrapper';
                    $footer_wrapper_classes .= !empty(aiero_get_prefered_option('footer_position')) ? ' footer-position-' . esc_attr(aiero_get_prefered_option('footer_position')) : '';
                    $footer_classes .= !empty(aiero_get_prefered_option('footer_style')) ? ' footer-' . esc_attr(aiero_get_prefered_option('footer_style')) : '';
                    $footer_classes .= !empty(aiero_get_prefered_option('footer_border_radius')) ? ' footer-br-' . esc_attr(aiero_get_prefered_option('footer_border_radius')) : '';
                    ?>

                    <!-- Footer -->
                    <?php
                    echo '<footer class="' . esc_attr($footer_wrapper_classes) . '">';
                        echo '<div class="' . esc_attr($footer_classes) . '">';
                            echo '<span class="footer-bg"></span>';
                            switch (aiero_get_prefered_option('footer_style')) {
                                case 'type-3':
                                    get_template_part('templates/footer/footer-3');
                                    break;                                
                                default:
                                    get_template_part('templates/footer/footer-1');
                                    break;
                            }
                        echo '</div>';
                    echo '</footer>';
                }
                if( aiero_get_prefered_option('footer_scrolltop_status') == 'on' ) {
                    echo '<div class="footer-scroll-top">';
                        echo '<button class="fontello icon-chevron-up" aria-label="Scroll Up"></button>';
                    echo '</div>';
                }
            ?>
        </div>
        <?php
            wp_footer();
        ?>
    </body>
</html>