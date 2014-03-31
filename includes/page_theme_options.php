<?php
class GCOptionsPage{
    //                          __              __      
    //   _________  ____  _____/ /_____ _____  / /______
    //  / ___/ __ \/ __ \/ ___/ __/ __ `/ __ \/ __/ ___/
    // / /__/ /_/ / / / (__  ) /_/ /_/ / / / / /_(__  ) 
    // \___/\____/_/ /_/____/\__/\__,_/_/ /_/\__/____/  
    const PARENT_PAGE = 'themes.php';
    const LABEL_KEY   = 'options';

    //                __  _                 
    //   ____  ____  / /_(_)___  ____  _____
    //  / __ \/ __ \/ __/ / __ \/ __ \/ ___/
    // / /_/ / /_/ / /_/ / /_/ / / / (__  ) 
    // \____/ .___/\__/_/\____/_/ /_/____/  
    //     /_/                              
    private $options;

    //                    __  __              __    
    //    ____ ___  ___  / /_/ /_  ____  ____/ /____
    //   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
    //  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
    // /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        add_submenu_page(self::PARENT_PAGE, __('Theme options'), __('Theme options'), 'administrator', __FILE__, array($this, 'create_admin_page'), 'favicon.ico'); 
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        $this->options = $this->getAllOptions();       

        ?>
        <div class="wrap">
            <?php screen_icon(); ?>                 
            <form method="post" action="options.php">
            <?php                
                settings_fields('gc_options_page');   
                do_settings_sections(__FILE__);
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Get all options
     */
    public function getAllOptions()
    {
        return get_option('gcoptions');
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting('gc_options_page', 'gcoptions', array($this, 'sanitize'));
        add_settings_section('default_settings', __('Options'), null, __FILE__); 

        add_settings_field('left_block_title', __('Left block title'), array($this, 'left_block_title_callback'), __FILE__, 'default_settings');
        add_settings_field('left_block_text', __('Left block text'), array($this, 'left_block_text_callback'), __FILE__, 'default_settings');
        add_settings_field('middle_block_title', __('Middle block title'), array($this, 'middle_block_title_callback'), __FILE__, 'default_settings');
        add_settings_field('middle_block_text', __('Middle block text'), array($this, 'middle_block_text_callback'), __FILE__, 'default_settings');
        add_settings_field('right_block_title', __('Right block title'), array($this, 'right_block_title_callback'), __FILE__, 'default_settings');
        add_settings_field('right_block_text', __('Right block text'), array($this, 'right_block_text_callback'), __FILE__, 'default_settings');
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = array();     

        if(isset($input['left_block_title'])) $new_input['left_block_title']     = strip_tags($input['left_block_title']);
        if(isset($input['left_block_text'])) $new_input['left_block_text']       = strip_tags($input['left_block_text']);
        if(isset($input['middle_block_title'])) $new_input['middle_block_title'] = strip_tags($input['middle_block_title']);
        if(isset($input['middle_block_text'])) $new_input['middle_block_text']   = strip_tags($input['middle_block_text']);
        if(isset($input['right_block_title'])) $new_input['right_block_title']   = strip_tags($input['right_block_title']);
        if(isset($input['right_block_text'])) $new_input['right_block_text']     = strip_tags($input['right_block_text']);

        return $new_input;
    }


    /** 
     * Get the settings option array and print one of its values
     */
    public function left_block_title_callback()
    {
        printf('<input type="text" class="regular-text" id="left_block_title" name="gcoptions[left_block_title]" value="%s" />', isset($this->options['left_block_title']) ? esc_attr($this->options['left_block_title']) : '');
    }


    /** 
     * Get the settings option array and print one of its values
     */
    public function left_block_text_callback()
    {
        printf('<textarea cols="37" rows="5" name="gcoptions[left_block_text]" class="regular-text" id="left_block_text">%s</textarea>', isset($this->options['left_block_text']) ? esc_attr($this->options['left_block_text']) : '');
    }
    
    /** 
     * Get the settings option array and print one of its values
     */
    public function middle_block_title_callback()
    {
        printf('<input type="text" class="regular-text" id="middle_block_title" name="gcoptions[middle_block_title]" value="%s" />', isset($this->options['middle_block_title']) ? esc_attr($this->options['middle_block_title']) : '');
    }


    /** 
     * Get the settings option array and print one of its values
     */
    public function middle_block_text_callback()
    {
        printf('<textarea cols="37" rows="5" name="gcoptions[middle_block_text]" class="regular-text" id="middle_block_text">%s</textarea>', isset($this->options['middle_block_text']) ? esc_attr($this->options['middle_block_text']) : '');
    }

     /** 
     * Get the settings option array and print one of its values
     */
    public function right_block_title_callback()
    {
        printf('<input type="text" class="regular-text" id="right_block_title" name="gcoptions[right_block_title]" value="%s" />', isset($this->options['right_block_title']) ? esc_attr($this->options['right_block_title']) : '');
    }


    /** 
     * Get the settings option array and print one of its values
     */
    public function right_block_text_callback()
    {
        printf('<textarea cols="37" rows="5" name="gcoptions[right_block_text]" class="regular-text" id="right_block_text">%s</textarea>', isset($this->options['right_block_text']) ? esc_attr($this->options['right_block_text']) : '');
    }

}
// =========================================================
// LAUNCH
// =========================================================
$GLOBALS['gcoptions'] = new GCOptionsPage();