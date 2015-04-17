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

    /**
     * Create a new instance of this class.
     */
    protected function __construct()
    {
        // Register post type.
        $this->registerPostType();

        // Change profile title field placeholder.
        $this->changeTitleFieldPlaceholder();

        // Add columns to admin table.
        $this->addAdminTableColumns();
    }

    /**
     * Register 'profile' post type.
     */
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

    /**
     * Change the title field placeholder
     */
    protected function changeTitleFieldPlaceholder()
    {
        add_filter('enter_title_here', function($title)
        {
            $screen = get_current_screen();

            if ($screen->post_type !== 'profile')
            {
                return $title;
            }

            return 'Enter profile name';
        });
    }

    /**
     * Add admin table columns.
     */
    protected function addAdminTableColumns()
    {
        add_filter('manage_edit-profile_columns', array($this, 'renderProfileTableColumns'));
        add_filter('manage_edit-profile_sortable_columns', array($this, 'makeProfileTableColumnsSortable'));
        add_action('manage_profile_posts_custom_column', array($this, 'renderProfileTableColumnValues'), 10, 2);
    }

    /**
     * Render profile table columns.
     */
    public function renderProfileTableColumns($columns)
    {
        $new_columns = array();

        foreach ($columns as $key => $value)
        {
            // Insert contact column before date
            if ($key == 'date')
            {
                $new_columns['organization'] = __('Organization');
            }

            $new_columns[$key] = $value;
        }


        return $new_columns;
    }

    /**
     * Make profile table columns sortable.
     */
    public function makeProfileTableColumnsSortable($columns)
    {
        $columns['organization'] = 'organization';

        return $columns;
    }

    /**
     * Render profile table column values.
     */
    public function renderProfileTableColumnValues($column_name, $id)
    {
        switch ($column_name)
        {
            case 'organization':
                $organization = get_field('organization', $id);
                echo $organization;
                break;
        }
    }

}
