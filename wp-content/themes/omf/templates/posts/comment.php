<div class="Grid Grid--collapsable Grid--align-middle">

    <div class="Grid-cell u-size-4of12">

        <div class="Comment-header">

            <p class="Comment-author"><?php echo get_comment_author(); ?></p>

            <ul class="Comment-meta">
                <li>
                    <time class="Comment-date" datetime="<?php echo comment_date('c'); ?>"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s'), get_comment_date(),  get_comment_time()); ?></a></time>
                </li>
                <li>
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '<p class="Comment-reply-link">', 'after' => '</p>'))); ?>
                </li>
            </ul>

        </div>

    </div>

    <div class="Grid-cell u-size-8of12">

        <?php if ($comment->comment_approved == '0') : ?>
            <div class="Comment-alert">
                Your comment is awaiting moderation.
            </div>
        <?php endif; ?>

        <div class="Comment-content">
            <?php comment_text(); ?>
        </div>

    </div>



    <!--

    <div class="Media-object Comment-image">

        <?php if ( get_comment_author_email() ) : ?>

            <?php echo get_avatar( $comment ) ?>

        <?php else : ?>

            <a href="http://gravatar.com/"><?php echo get_avatar( $comment ) ?></a>

        <?php endif; ?>

    </div>

    <div class="Media-body">

        <h4 class="Media-header Comment-title"><?php echo get_comment_author_link(); ?></h4>

        <time class="Comment-time" datetime="<?php echo comment_date('c'); ?>"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s', 'expeditionaryart'), get_comment_date(),  get_comment_time()); ?></a></time>

        <?php edit_comment_link(__('(Edit)', 'expeditionaryart'), '<p class="Comment-edit-link">', '</p>'); ?>

        <?php if ($comment->comment_approved == '0') : ?>
            <div class="Alert Alert--info">
                <?php _e('Your comment is awaiting moderation.', 'expeditionaryart'); ?>
            </div>
        <?php endif; ?>

        <div class="Comment-content">
            <?php comment_text(); ?>
        </div>

        <div class="Comment-footer">
            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '<p class="Comment-reply-link">', 'after' => '</p>'))); ?>
        </div>
    -->
