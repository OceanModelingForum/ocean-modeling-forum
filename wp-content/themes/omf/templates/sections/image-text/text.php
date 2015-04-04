<div class="Grid-cell u-size-7of12 u-pad">

    <?php if ($title || $supertitle) : ?>

        <header class="Section-header">

            <?php if ($supertitle) : ?>

                <p class="Section-supertitle"><?php echo $supertitle; ?></p>

            <?php endif; ?>

            <?php if ($title) : ?>

                <h2 class="Section-title"><?php echo $title; ?></h2>

            <?php endif; ?>

        </header>

    <?php endif; ?>

    <?php if ($text) : ?>

        <div class="Section-content">

            <div class="Entry">

                <?php echo $text; ?>

            </div>

        </div>

    <?php endif; ?>

</div>
