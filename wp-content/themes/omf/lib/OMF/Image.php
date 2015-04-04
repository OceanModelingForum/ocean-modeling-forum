<?php namespace OMF;

class Image {

    protected $args;

    protected $url;

    protected $classes;

    public function __construct($args)
    {
        $this->args = array_merge_recursive(array(
            'classes' => array('Image')
        ), $args);

        $this->make();
    }

    

    public function get()
    {
        return 'Image here.';
    }
}
