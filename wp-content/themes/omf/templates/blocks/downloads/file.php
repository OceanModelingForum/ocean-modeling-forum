<?php

/**
 * Display a file within the downloads block.
 */

$file = $file['file'];

$size = filesize(get_attached_file($file['ID']));

?>

<article class="File">

    <a class="File-inner" href="<?php echo $file['url']; ?>" download>

        <div class="File-icon">

            <svg><use xlink:href="#icon-file-empty"></use></svg>

        </div>

        <header class="File-header">

            <h3 class="File-title"><?php echo apply_filters('the_title', $file['title']); ?></h3>

            <?php if ( ! empty($file['caption'])) : ?>

                <div class="File-description">

                    <?php echo apply_filters('the_title', $file['caption']); ?>

                </div>

            <?php endif; ?>

            <?php if ($size) : ?>

                <p class="File-size"><?php echo format_size_units($size); ?></p>

            <?php endif; ?>

        </header>

    </a>

</article>
