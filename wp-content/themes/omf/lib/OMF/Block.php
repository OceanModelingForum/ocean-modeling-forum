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
            'content' => 'normal',
        ));

        // Default attributes
        // * all options must be declared here to be included style string *
        $this->attributes = wp_parse_args($attributes, array(
            'height'        => '',
            'background'    => '',
            'text'          => '',
            'image_align'   => '',
            'image_anchor'  => '',
        ));
    }

    /**
     * Make style string from attributes
     */
    protected function getStyles()
    {
        $styles = array('Block');

        foreach ($this->attributes as $key => $value)
        {
            if ( ! $value) continue;

            // Convert key-safe attribute names to style attributes
            $key = str_replace('_', '-', $key);

            // Style examples:
            // Block--type-normal
            // Block--height-three-quarter
            // Block--background-light
            $styles[] = 'Block--' . $key . '-' . $value;
        }

        return implode(' ', $styles);
    }

    /**
     * Output block content
     *
     * @return string
     */
    public function show()
    {
        extract($this->args);

        $styles = $this->getStyles();

        $template = locate_template('templates/blocks/block-' . $content . '.php');

        if ( ! $template)
        {
            return;
        }

        include $template;
    }

}
