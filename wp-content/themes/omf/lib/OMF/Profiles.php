<?php namespace OMF;

use ElContraption\WpPostType\PostType;
use WP_Query;

class Profiles {

    /**
     * Instance of this class
     */
    protected static $instance = null;

    /**
     * Return an instance of this class
     */
    public static function getInstance()
    {
        // If the single instance hasn't been set, set it now.
        if (self::$instance == null)
        {
            self::$instance = new self;
        }

        return self::$instance;
    }

    protected function __construct()
    {
        // Register post type.
        $this->registerPostType();
    }

    protected function registerPostType()
    {
        $args = array(
            'public' => true,
            'menu_icon' => 'dashicons-groups',
            'rewrite' => array(
                'slug' => 'profiles',
                'with_front' => false,
            )
        );

        $postType = new PostType('profile', array(), $args);
    }

}
