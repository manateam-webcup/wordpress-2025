<?php
/*
 * Created by Artureanec
*/

if (post_password_required()) {
    return;
}

if ( ! function_exists( 'aiero_comment_code' ) ) {
    function aiero_comment_code($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>

        <div <?php comment_class('post-comment-wrapper'); ?> id="comment-<?php comment_ID() ?>">
            <div class="post-comment-item">
                <?php
                    if( $args['avatar_size'] != 0 ){
                        echo '<div class="post-comment-avatar">';
                            echo get_avatar($comment, $args['avatar_size']);
                        echo '</div>';
                    }
                ?>

                <div class="post-comment-main">
                    <?php
                    if ($comment->comment_approved == '0') {
                        echo '<p>' . esc_html__('Your comment is awaiting moderation.', 'aiero') . '</p>';
                    }

                    echo '
                        <div class="post-comment-meta">
                            <div class="post-comment-info">
                                <div class="post-comment-author">' . esc_html(get_comment_author()) . '</div>';
                                ?>
                                <div class="post-comment-date"><?php esc_html(comment_date()); ?></div>
                            </div>
                            <div class="post-comment-buttons">
                                <?php
                                    comment_reply_link(
                                        array_merge(
                                            $args, array(
                                                'before'        => '',
                                                'after'         => '',
                                                'depth'         => $depth,
                                                'reply_text'    => esc_html__('Reply', 'aiero'),
                                                'max_depth'     => $args['max_depth']
                                            )
                                        )
                                    );
                                    edit_comment_link(esc_html__('Edit', 'aiero'));
                                ?>
                            </div>
                            <?php
                            echo '
                        </div>
                    ';
                    ?>
                    <div class="post-comment-content">
                        <?php comment_text(); ?>
                    </div>
                </div>
            </div>
        <?php
    }
}

if ( have_comments() || comments_open() || pings_open() ) {
    ?>
        <div class="post-comments-wrapper">
            <?php
            if (have_comments()) {
                $comments_number = number_format_i18n( get_comments_number() );
                ?>

                <h4 class="post-comments-title">
                    <?php
                        echo esc_html(_n( 'Comment', 'Comments', $comments_number, 'aiero'));
                        if(aiero_get_prefered_option('post_comment_counter_status') == 'on') {
                            echo ' <span class="post-comments-title-counter">(' . esc_html($comments_number) . ')</span>';
                        }
                    ?>
                </h4>

                <div class="post-comments-list">
                    <?php
                    wp_list_comments(array(
                        'style'         => 'div',
                        'avatar_size'   => 122,
                        'type'          => 'all',
                        'callback'      => 'aiero_comment_code'
                    ));
                    ?>
                </div>

                <?php the_comments_navigation();
            }
            comment_form();
            ?>
        </div>

    <?php
}