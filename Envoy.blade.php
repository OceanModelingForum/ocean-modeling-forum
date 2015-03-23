<?php
if (! file_exists(dirname(__FILE__) . '/env.php')) {
	throw new Exception('Could not find an env.php file with local configuration settings.');
}

$env = require(dirname(__FILE__) . '/env.php');

$production = $env['production'];
?>

@servers(['production' => $production['ssh']]);

<?php

$repo           = $production['repository'];
$release_dir    = $production['release_dir'];
$app_dir        = $production['app_dir'];
$shared_dir     = $production['shared_dir'];
$shared_assets  = $production['shared_assets'];
$composer_dir   = $production['composer_dir'];
$release = date('YmdHis');
?>

@macro('deploy', ['on' => 'production'])
    fetch_repo
    run_composer
    update_permissions
    update_app_symlink
    symlink_shared_assets
@endmacro

@macro('rollback', ['on' => 'production'])

@endmacro

@task('fetch_repo')
    [ -d {{ $release_dir }} ] || mkdir {{ $release_dir }};
    cd {{ $release_dir }};
    git clone -b master --depth=1 {{ $repo }} {{ $release }};
@endtask

@task('run_composer')
    cd {{ $release_dir }}/{{ $release }}/{{ $composer_dir }};
    composer install --prefer-dist;
@endtask

@task('update_permissions')
    cd {{ $release_dir }};
    {{-- chgrp -R www-data {{ $release }}; --}}
    chmod -R ug+rwx {{ $release }};
@endtask

@task('symlink_shared_assets')
    @foreach($shared_assets as $asset)
        rm -rf {{ $release_dir }}/{{ $release }}/{{ $asset }};
        ln -nfs {{ $shared_dir }}/{{ $asset }} {{ $release_dir }}/{{ $release }}/{{ $asset }};
        {{-- chgrp -h www-data {{ $release_dir }}/{{ $release }}/{{ $asset }}; --}}
    @endforeach
@endtask

@task('update_app_symlink')
    ln -nfs {{ $release_dir }}/{{ $release }} {{ $app_dir }};
    {{-- chgrp -h www-data {{ $app_dir }}; --}}
@endtask
