<?php

namespace REPLACE_PLUGIN_NAMESPACE;

class Plugin
{
    private static $_instance = null;

    private $templates;

    private $plugin_option_defaults = [
    ];

    public function __construct()
    {
        $this->templates = new \REPLACE_PLUGIN_NAMESPACE\Templates();

        // load plugin options
        // $this->loadPluginOptions();

        // process requests with action parameter
        $this->actionRoutes();

        // load hooks
        if (is_admin()) {
            $this->addAdminActions();
            $this->addAdminFilters();
        } else {
            $this->addActions();
            $this->addFilters();
        }
    }

    // Prevent any object or instance of class to be cloned
    private function __clone()
    {}

    // Have a single globally accessible static method
    public static function getInstance()
    {
        if (!is_object(self::$_instance)) {
            self::$_instance = new \REPLACE_PLUGIN_NAMESPACE\Plugin();
        }

        return self::$_instance;
    }

    public function activatePlugin()
    {
        foreach ($this->plugin_option_defaults as $option => $default_value) {
            add_option($option, $default_value);
        }
    }

    public function deactivatePlugin()
    {
    }

    private function actionRoute($action_name, $action, $action_params = array(), $exit = true)
    {
        if (isset($_REQUEST['action']) && $_REQUEST['action'] == $action_name) {
            if (is_array($action)) {
                call_user_func_array($action, $action_params);
            } else {
                call_user_func($action);
            }
            if ($exit) {
                exit;
            }

        }
    }

    private function actionRoutes()
    {
        // $this->actionRoute('test', function () {
        //     echo "test";
        // });
    }

    private function addAdminActions()
    {
        // add_action('admin_menu', [$this, 'addOptionsPage']);
        // add_action('admin_init', [$this, 'addOptionsPageFields']);
    }

    private function addAdminFilters()
    {
    }

    private function addActions()
    {
    }

    private function addFilters()
    {
    }

    private function loadPluginOptions()
    {
        // $this->relevance = get_option('REPLACE_PLUGIN_NAMESPACE_tag_relevance');
    }

    public function addOptionsPage()
    {
        // add_options_page(
        //     'OpenCalais Tagging',
        //     'OpenCalais Tagging',
        //     'manage_options',
        //     REPLACE_PLUGIN_NAMESPACE_PLUGIN_NAME,
        //     [$this->templates, 'adminOptionPage']
        // );
    }

    public function addOptionsPageFields()
    {
        // $template = new \REPLACE_PLUGIN_NAMESPACE\Templates();

        // // load styles and scripts
        // wp_enqueue_script('jquery-ui-slider');
        // wp_enqueue_script('adminOptionsPageScript',
        //     REPLACE_PLUGIN_NAMESPACE_ASSETS_URL . 'js/adminOptionsPageScript.js',
        //     ['jquery-ui-slider'],
        //     PLUGIN_VERSION);
        // wp_enqueue_style('jquery-ui-slider-css',
        //     // 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/base/jquery-ui.css',
        //     'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css',
        //     false,
        //     PLUGIN_VERSION);
        // wp_enqueue_style('adminOptionsPageStyles',
        //     REPLACE_PLUGIN_NAMESPACE_ASSETS_URL . 'css/adminOptionsPageStyles.css',
        //     ['jquery-ui-slider-css'],
        //     PLUGIN_VERSION);

        // ///////////////////////
        // // SETTINGS SECTIONS //
        // ///////////////////////

        // add_settings_section(
        //     'REPLACE_PLUGIN_NAMESPACE_api_setting_section',
        //     'OpenCalais API',
        //     function () use ($template) {$template->adminOptionApiSection();},
        //     'REPLACE_PLUGIN_NAMESPACE_options'
        // );

        // ///////////////////////////////////////////
        // // OPTIONS AND CONECTION SETTINGS FIELDS //
        // ///////////////////////////////////////////

        // // API KEY
        // register_setting('REPLACE_PLUGIN_NAMESPACE_options', 'REPLACE_PLUGIN_NAMESPACE_api_key');
        // add_settings_field(
        //     'REPLACE_PLUGIN_NAMESPACE_api_key',
        //     'Your OpenCalais API Key',
        //     function () use ($template) {$template->adminOptionApiField();},
        //     'REPLACE_PLUGIN_NAMESPACE_options',
        //     'REPLACE_PLUGIN_NAMESPACE_api_setting_section'
        // );
    }

}
