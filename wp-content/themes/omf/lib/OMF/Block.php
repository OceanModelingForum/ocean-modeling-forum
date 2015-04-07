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
            'id'                => '',
            'type'              => 'normal',
            'styles'            => '',
            'image_placement'   => '',
            'image'             => '',
            'image_padding'     => '',
            'image_anchor'      => '',
            'image_caption'     => '',
            'text_placement_horizontal'    => '',
            'text_placement_vertical'    => '',
            'text_alignment'    => '',
            'text_width'        => '',
            'show_next_arrow'   => '',
            'next_block'        => false,
        ));

        // Default attributes
        // * all options must be declared here to be included style string *
        $this->attributes = wp_parse_args($attributes, array(
            'height'        => '',
            'background'    => '',
            'text'          => '',
        ));

        if ($this->args['image_placement'] == 'background') $this->args['styles']['background-image'] = 'url(' . $this->args['image'] . ')';

        if ($this->args['image_anchor']) $this->args['styles']['background-position'] = $this->args['image_anchor'];
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

        $next_arrow = $this->makeNextArrow();

        $classes = $this->getClasses();

        $styles = $this->getStyles();

        $template = locate_template('templates/blocks/block-' . $type . '.php');

        if ( ! $template) return false;

        include $template;
    }

    /**
     * Create next arrow
     */
    protected function makeNextArrow()
    {
        ob_start();

        extract($this->args);

        include locate_template('templates/blocks/next-arrow.php');

        $output = ob_get_contents();

        ob_end_clean();

        return $next_block ? $output : false;
    }

}
