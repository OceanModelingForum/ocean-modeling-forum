<?php
/**
 * The comments template
 */

// password protect?
if ( post_password_required() ) {
    return;
}
?>

<?php if ( have_comments() ) : ?>

    <section class="Comments" id="comments">

        <header class="Comments-header">

            <h2 class="Comments-title">Comments</h2>

        </header>

        <div class="Comments-content">

            <ol class="Comments-list">
                <?php wp_list_comments( array('walker' => new Roots_Walker_Comment) ) ?>
            </ol>

            <?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>

                <nav class="Pagination">
                    <ul>
                        <?php if ( get_previous_comments_link() ) : ?>

                            <li class="Pagination-previous"><?php previous_comments_link( __('&larr; Older comments', 'expeditionaryart') ) ?></li>

                        <?php endif ?>

                        <?php if ( get_next_comments_link() ) : ?>

                            <li class="Pagination-next"><?php next_comments_link( __('Newer comments &rarr;', 'expeditionaryart') ) ?></li>

                        <?php endif ?>
                    </ul>
                </nav>

            <?php endif ?>

            <?php if ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

                <div class="Alert Alert--warning">
                    <br>
                    <?php _e('Comments are closed.', 'expeditionaryart') ?>
                </div>

            <?php endif ?>

        </div><!-- .Comments-content -->

    </section><!-- .Comments -->

<?php endif ?>

<?php if ( ! have_comments() && ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

    <!-- <section class="Comments">

        <div class="Comments-content">

            <div class="Alert Alert--warning">
                <?php // _e('Comments are closed.', 'expeditionaryart') ?>
            </div>

        </div>

    </section> -->

<?php endif ?>

<?php if ( comments_open() ) : ?>

    <section class="Comments-respond" id="respond">

        <div class="Comments-respond-content">

            <p class="Comments-respond-cancel"><?php cancel_comment_reply_link() ?></p>

            <?php if ( get_option('comment_registration') && ! is_user_logged_in() ) : ?>

                <p class="Comments-respond-log-in"><?php printf( __('You must be <a href="%s">logged in</a> to post a comment.', 'expeditionaryart'), wp_login_url( get_permalink() ) ) ?></p>

            <?php else : ?>

                <form class="Form Comments-form" action="<?php echo get_option('siteurl') ?>/wp-comments-post.php" method="post">

                    <div class="Entry">

                        <h4>Leave a comment</h4>

                        <?php if ( is_user_logged_in() ) : ?>

                            <p class="Comments-respond-logged-in-as">
                                <?php printf( __( 'Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'expeditionaryart' ), get_option('siteurl'), $user_identity ); ?>
                                <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e( 'Log out of this account', 'expeditionaryart' ); ?>"><?php _e( 'Log out &raquo;', 'expeditionaryart' ); ?></a>
                            </p>

                        <?php else : ?>

                            <div class="Grid Grid--collapsable Grid--padded">

                                <div class="Grid-cell u-size-6of12">

                                    <input class="Form-input Form-input--text" type="text" name="author" placeholder="Name (required)" value="<?php echo esc_attr( $comment_author ); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>

                                </div>

                                <div class="Grid-cell u-size-6of12">

                                    <input class="Form-input Form-input--text" type="email" name="email" placeholder="Email (required)" id="email" value="<?php echo esc_attr( $comment_author_email ); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>

                                </div>

                            </div>

                        <?php endif; ?>

                        <textarea class="Form-input Form-input--textarea" name="comment" id="comment" cols="30" rows="10" aria-required="true"></textarea>

                        <input class="Form-input Form-input--submit Button Button--red" type="submit" value="Post Comment">

                        <?php comment_id_fields(); ?>

                        <?php do_action('comment_form', $post->ID) ?>

                    </div>

                </form>

            <?php endif ?>

        </div><!-- .Comments-respond-content -->

    </section>

<?php endif ?>
