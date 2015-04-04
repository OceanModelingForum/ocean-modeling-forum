<?php namespace OMF;

/**
 * Blocks are content sections that correspond to
 * the ACF 'block' field group.
 */

class Block {

    /**
     * Optional arguments
     *
     * @var array
     */
    protected $args;

    /**
     * Optional attributes
     *
     * @var array
     */
    protected $attributes;

    /**
     * Create a new block
     */
    public function __construct($args = array(), $attributes = array())
    {
        // Default arguments
        $this->args = wp_parse_args($args, array(
            'id'            => '',
            'type'          => 'normal',
            'styles'        => '',
        ));


        // Default attributes
        // * all options must be declared here to be included style string *
        $this->attributes = wp_parse_args($attributes, array(
            'height'        => '',
            'background'    => '',
            'text'          => '',
        ));
    }

    /**
     * Make class string from attributes
     *
     * @return string
     */
    protected function getClasses()
    {
        $classes = array('Block');

        foreach ($this->attributes as $key => $value)
        {
            if ( ! $value) continue;

            // Class examples:
            // Block--type-normal
            // Block--height-three-quarter
            // Block--background-light
            $classes[] = 'Block--' . $key . '-' . $value;
        }

        return implode(' ', $classes);
    }

    /**
     * Make style string from styles array
     *
     * @return string
     */
    protected function getStyles()
    {
        if ( ! $this->args['styles']) return '';

        $styles = '';

        foreach ($this->args['styles'] as $key => $value)
        {
            $styles .= "$key: $value;";
        }

        return $styles;
    }

    /**
     * Output block content
     *
     * @return string
     */
    public function show()
    {
        extract($this->args);

        $classes = $this->getClasses();

        $styles = $this->getStyles();

        $template = locate_template('templates/blocks/block-' . $type . '.php');

        if ( ! $template) return false;

        include $template;
    }

}
