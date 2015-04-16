<?php namespace OMF;

use ElContraption\WpPostType\PostType;
use WP_Query;

class WorkingGroups {

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
        // Register post type
        $this->registerPostType();
    }

    protected function registerPostType()
    {
        $args = array(
            'public' => true,
            'rewrite' => array(
                'slug' => 'working-groups',
                'with_front' => false,
            )
        );

        $postType = new PostType('working_group', array(), $args);
    }

    public function all()
    {
        $args = array(
            'post_type' => 'working_group',
            'posts_per_page' => -1,
            'meta_key'  => 'group_code',
            'orderby' => 'meta_value',
            'order'     => 'ASC'
        );

        // Default

        $query = new WP_Query($args);

        return $query;
    }

    public function find()
    {
        
    }

}
