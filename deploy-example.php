<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SSH credentials
    |--------------------------------------------------------------------------
    |
    | SSH username and server credentials. Remember to set up an SSH key.
    |
    | e.g. you@server.com
    |
    */

    'ssh' => '',

    /*
    |--------------------------------------------------------------------------
    | Repository URL
    |--------------------------------------------------------------------------
    |
    | URL of the Git repository to deploy from.
    |
    | e.g. git@github.com/username/projectname.git
    |
    */

    'repo' => 'git@github.com:OceanModelingForum/ocean-modeling-forum.git',

    /*
    |--------------------------------------------------------------------------
    | Releases directory
    |--------------------------------------------------------------------------
    |
    | Path to the directory on the server to store releases in.
    |
    | e.g. /var/www/releases
    |
    */

    'releases_dir' => '/storage/av02710/www/releases',

    /*
    |--------------------------------------------------------------------------
    | Application symlink
    |--------------------------------------------------------------------------
    |
    | Path on the server to symlink to the latest release.
    |
    | e.g. /var/www/public
    |
    */

    'app_symlink' => '/storage/av02710/www/public_html',

    /*
    |--------------------------------------------------------------------------
    | Shared directory
    |--------------------------------------------------------------------------
    |
    | Path to the directory on the server to share files between releases.
    |
    | e.g. /var/www/shared
    |
    */

    'shared_dir' => '/storage/av02710/www/shared',

    /*
    |--------------------------------------------------------------------------
    | Scripts directory
    |--------------------------------------------------------------------------
    |
    | Path to the directory on the server to run post-deploy scripts on.
    | Relative to the current release (no leading slash).
    |
    | This is typically the root of the application, an empty string.
    |
    */

    'scripts_dir' => 'wp-content/themes/omf',

    /*
    |--------------------------------------------------------------------------
    | Composer executable
    |--------------------------------------------------------------------------
    |
    | Path to the Composer executable on the server. Leave blank if you aren't
    | running Composer post-deploy.
    |
    | e.g. /bin/composer.phar, or simply 'composer' if installed globally.
    |
    */

    'composer_exec' => '/storage/av02710/bin/composer.phar',

    /*
    |--------------------------------------------------------------------------
    | Shared assets
    |--------------------------------------------------------------------------
    |
    | Array of file or directories to share between releases. These files will
    | be symlinked from their release to the shared directory. Paths are
    | relative to the release directory, and must match their counterpart
    | within the release.
    |
    | e.g. ['.env', 'storage']
    |
    */

    'shared' => [
        '.htaccess',
        'env.php',
        'wp-content/uploads',
        'wp-content/plugins',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom symlinks
    |--------------------------------------------------------------------------
    |
    | Array of additional symlinks to create in the release, as key/value 
    | pairs. Target values must specify the full path on the server.
    |
    | e.g. ['link/me' => '/var/www/path/to/linked/file']
    |
    */

    'symlinks' => [],

    /*
    |--------------------------------------------------------------------------
    | Release limit
    |--------------------------------------------------------------------------
    |
    | The number of releases to keep on the server.
    |
    */

    'release_limit' => 5,

];