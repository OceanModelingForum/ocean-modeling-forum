<?php
if (! file_exists(dirname(__FILE__) . '/env.php')) {
	throw new Exception('Could not find an env.php file with local configuration settings.');
}

$env = require(dirname(__FILE__) . '/env.php');

$production = $env['production'];
?>

<?php $__container->servers(['production' => $production['ssh']]); ?>;

<?php

$repo           = $production['repository'];
$release_dir    = $production['release_dir'];
$app_dir        = $production['app_dir'];
$shared_dir     = $production['shared_dir'];
$shared_assets  = $production['shared_assets'];
$composer_dir   = $production['composer_dir'];
$release = date('YmdHis');
?>

<?php $__container->startMacro('deploy', ['on' => 'production']); ?>
    fetch_repo
    run_composer
    update_permissions
    update_app_symlink
    symlink_shared_assets
<?php $__container->endMacro(); ?>

<?php $__container->startMacro('rollback', ['on' => 'production']); ?>

<?php $__container->endMacro(); ?>

<?php $__container->startTask('fetch_repo'); ?>
    [ -d <?php echo $release_dir; ?> ] || mkdir <?php echo $release_dir; ?>;
    cd <?php echo $release_dir; ?>;
    git clone -b master --depth=1 <?php echo $repo; ?> <?php echo $release; ?>;
<?php $__container->endTask(); ?>

<?php $__container->startTask('run_composer'); ?>
    cd <?php echo $composer_dir; ?>;
    composer install --prefer-dist;
<?php $__container->endTask(); ?>

<?php $__container->startTask('update_permissions'); ?>
    cd <?php echo $release_dir; ?>;
    chgrp -R www-data <?php echo $release; ?>;
    chmod -R ug+rwx <?php echo $release; ?>;
<?php $__container->endTask(); ?>

<?php $__container->startTask('symlink_shared_assets'); ?>
    <?php foreach($shared_assets as $asset): ?>
        rm -rf <?php echo $release_dir; ?>/<?php echo $release; ?>/<?php echo $asset; ?>;
        ln -nfs <?php echo $shared_dir; ?>/<?php echo $asset; ?> <?php echo $release_dir; ?>/<?php echo $release; ?>/<?php echo $asset; ?>;
        chgrp -h www-data <?php echo $release_dir; ?>/<?php echo $release; ?>/<?php echo $asset; ?>;
    <?php endforeach; ?>
<?php $__container->endTask(); ?>

<?php $__container->startTask('update_app_symlink'); ?>
    ln -nfs <?php echo $release_dir; ?>/<?php echo $release; ?> <?php echo $app_dir; ?>;
    chgrp -h www-data <?php echo $app_dir; ?>;
<?php $__container->endTask(); ?>
