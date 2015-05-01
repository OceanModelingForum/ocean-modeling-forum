<?php namespace OMF;

class Modal {

    /**
     * A unique ID for this modal.
     *
     * @var string
     */
    protected $id;

    /**
     * Path to the modal template;
     *
     * @var string
     */
    protected $template;

    /**
     * Attributes to pass to modal template.
     *
     * @var array
     */
    protected $attributes;

    /**
     * Optional settings for the modal.
     *
     * @var array
     */
    protected $options;

    /**
     * Create a new Modal instance
     *
     * @param string    $id             Unique ID for this modal
     * @param string    $template       Path to template file, relative to theme
     * @param array     $attributes     Attributes to pass directly to the modal template
     * @param array     $options        Optional settings for the modal
     */
    public function __construct($id, $template, $attributes = array(), $options = array())
    {
        $this->id = $id;

        $this->template = $template;

        $this->attributes = $attributes;

        $this->options = wp_parse_args($options, array(
            'container_class'   => 'Modal',
            'content_class'     => 'Modal-content',
            'center_class'      => 'Modal-center',
        ));

        // Render modal in footer
        add_action('wp_footer', array($this, 'render'));
    }

    /**
     * Render modal in footer
     *
     * @return string
     */
    public function render()
    {
        // Make attributes available to template
        extract($this->attributes);

        ?>

            <div class="<?php echo $this->options['container_class'] ?>" id="<?php echo $this->id; ?>" tabindex="-1" role="dialog" aria-hidden="true"<?php if (isset($this->options['label'])) echo ' aria-labelledby="' . $this->options['label'] . '"'; ?>>

                <div class="<?php echo $this->options['content_class']; ?>">

                    <!-- <div class="<?php //echo $this->options['center_class']; ?>"> -->

                        <?php include locate_template($this->template . '.php'); ?>

                    <!-- </div> -->

                </div>

            </div>

        <?php
    }

}
