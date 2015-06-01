
@setup

    /**
     * Define deployment environments
     *
     * Default is the first setting in this array.
     */
    $environments = [
        'deploy' => include('envoy-config.php'),
    ];

    /**
     * Set options based on environment
     */
    $opts = isset($env) ? $environments[$env] : reset($environments);

    /**
     * These settings are required and must not be empty:
     */
    $required_not_empty = ['ssh', 'repo', 'releases_dir', 'app_symlink', 'shared_dir', 'release_limit'];

    /**
     * These settings are required, but may be empty (''):
     */
    $required = ['scripts_dir', 'composer_exec', 'shared'];

    /**
     * Check for required settings
     */
    foreach ($required_not_empty as $setting) if ( ! isset($opts[$setting]) || empty($opts[$setting])) throw new Execption($setting . ' must be set and not empty.');
    foreach ($required as $setting) if ( ! isset($opts[$setting])) throw new Execption($setting . ' must be set.');

    /**
     * Extract options
     */
    extract($opts);

    /**
     * Release name is current datetime
     */
    $release = date('YmdHis');

    /**
     * Define the Git branch to use
     */
    $branch = isset($branch) ? $branch : 'master';

@endsetup

@servers(['deploy' => $opts['ssh']])

@macro('deploy')
    clone_repository
    run_composer
    update_permissions
    symlink_new_release
    symlink_shared_assets
    remove_old_releases
@endmacro

@task('rollback')
    cd {{ $releases_dir }};

    # Symlink previous release
    find . -maxdepth 1 -type d -name '2*' | sort -r | head -n2 | tail -n1 | cut -c 3- | xargs -I '{}' ln -nfs {{ $releases_dir }}/'{}' {{ $app_symlink }};

    # Remove newest release
    ls -1d * | sort -r | head -n1 | xargs -d '\n' rm -Rf;

    echo "Rolled back to previous release";
@endtask

@task('clone_repository')
    [ -d {{ $releases_dir }} ] || mkdir {{ $releases_dir }};
    cd {{ $releases_dir }};
    git clone {{ $repo }} --branch={{ $branch }} --depth=1 {{ $release }};
    echo 'Repository cloned';
@endtask

@task('run_composer')
    @if ( ! empty($composer_exec))
        cd {{ $releases_dir }}/{{ $release }}/{{ $scripts_dir }};
        {{ $composer_exec }} install --prefer-dist --no-interaction --no-dev;
    @else
        echo '';
    @endif
@endtask

@task('update_permissions')
    cd {{ $releases_dir }};
    {{-- chgrp -R www-data {{ $release }}; --}}
    chmod -R ug+rwx {{ $release }};
@endtask

@task('symlink_new_release')
    ln -nfs {{ $releases_dir }}/{{ $release }} {{ $app_symlink }};
    {{-- chgrp -h www-data {{ $app_symlink }}; --}}
@endtask

@task('symlink_shared_assets')
    [ -d {{ $shared_dir }} ] || mkdir {{ $shared_dir }};
    @foreach($shared as $asset)
        rm -rf {{ $releases_dir }}/{{ $release }}/{{ $asset }};
        ln -nfs {{ $shared_dir }}/{{ $asset }} {{ $releases_dir }}/{{ $release }}/{{ $asset }};
        {{-- chgrp -h www-data {{ $releases_dir }}/{{ $release }}/{{ $asset }}; --}}
    @endforeach
@endtask

@task('update_wp_super_cache')
    echo '';
@endtask

@task('remove_old_releases')
    cd {{ $releases_dir }};
    find . -maxdepth 1 -type d -name '2*' | sort | head -n -{{ $release_limit }} | xargs -d '\n' rm -Rf;
    echo 'Cleaned up old deployments';
@endtask
