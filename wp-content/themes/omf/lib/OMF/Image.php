<?php namespace OMF;

class Image {

    /**
     * Image source URL
     *
     * @var string
     */
    protected $src;

    /**
     * The image caption
     *
     * @var string
     */
    protected $caption;

    /**
     * Optional settings for image.
     *
     * @var array
     */
    protected $options;

    /**
     * Create a new Image instance
     *
     * @param string    $src    Image source URL
     * @param array     $args   Optional settings
     */
    public function __construct($src, $args = array())
    {
        $this->src = $src;

        $this->options = wp_parse_args($args, array(
            'caption' => false,
        ));

        $this->caption = $this->options['caption'];
    }

    /**
     * Output the image element
     *
     * @return string
     */
    public function render()
    {
        $classes = array(
            'Image'
        );

        $styles = array(
            'background-image: url(' . $this->src . ');'
        );

        ?>

            <div class="<?php echo implode(' ', $classes); ?>" style="<?php echo implode(' ', $styles); ?>">

                <img src="<?php echo $this->src; ?>" alt="<?php echo htmlentities($this->caption, ENT_QUOTES); ?>" />

            </div>

        <?php
    }

    /**
     * Return the image caption
     *
     * @return string
     */
    public function caption()
    {
        return $this->caption;
    }

}
