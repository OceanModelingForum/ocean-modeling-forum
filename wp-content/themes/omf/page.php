<?php
/**
 * The main page template
 */

get_header();
?>

<?php get_template_part('templates/page/banner'); ?>

<div class="Main" role="main">

    <?php get_template_part('templates/sections/controller'); ?>

</div>

<?php get_footer(); ?>
