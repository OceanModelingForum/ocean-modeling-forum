<?php

/**
 * Display an image within a block
 */

use OMF\Modal;

// Make modal id from block id
//$modal_id = 'modal-block-' . $id . '-image';

// Create modal
// $modal = new Modal($modal_id, 'templates/modals/image', array(
//     'image' => $image,
//     'caption' => $image_caption,
// ));

?>

<div class="Image Image--bleed" style="background-image: url(<?php echo $image; ?>); padding-top: <?php echo $image_padding; ?>;">

    <img src="<?php echo $image; ?>" alt="">

    <div class="Image-caption">
        <?php echo $image_caption; ?>
    </div>

    <!-- <button class="Image-info" data-modal="modal-block-<?php echo $id; ?>-image">
        <svg><use xlink:href="#icon-info"></use></svg>
        <span>About the image</span>
    </button> -->

</div>
