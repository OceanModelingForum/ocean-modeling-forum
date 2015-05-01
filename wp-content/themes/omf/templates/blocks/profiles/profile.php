<?php

/**
 * Display a single profile in a profiles block.
 */

use \OMF\Modal;

$profile = get_post($profile['profile']);

$profile_id = sanitize_title($profile->post_title);
$image = get_field('image', $profile->ID);

$title = get_field('title', $profile->ID);
$organization = get_field('organization', $profile->ID);

$modal_fields = array(
    'name' => $profile->post_title,
    'title' => $title,
    'organization' => $organization,
    'bio' => get_field('text', $profile->ID),
    'image' => $image,
);

$modal = new Modal($profile_id, 'templates/modals/profile', $modal_fields);

?>

<article class="Bio-card">

    <a class="Bio-card-inner" href="#<?php echo $profile_id; ?>" data-modal="<?php echo $profile_id; ?>">

        <div class="Grid Grid--align-middle">

            <div class="Grid-cell u-size-4of12">

                <?php if ($image) : ?>

                    <div class="Bio-card-image" style="background-image: url(<?php echo $image['sizes']['medium']; ?>);"></div>

                <?php endif; ?>

            </div>

            <div class="Grid-cell u-size-8of12">

                <header class="Bio-card-header">

                    <h3 class="Bio-card-name"><?php echo get_the_title($profile->ID); ?></h3>

                    <?php if ($title) : ?>

                        <p class="Bio-card-title"><?php echo apply_filters('the_title', $title); ?></p>

                    <?php endif; ?>

                    <?php if ($organization) : ?>

                        <p class="Bio-card-org"><?php echo apply_filters('the_title', $organization); ?></p>

                    <?php endif; ?>

                </header>

            </div>

        </div>

    </a>

</article>
