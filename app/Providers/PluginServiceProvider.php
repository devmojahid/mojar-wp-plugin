<?php

namespace Mojar\Providers;

class PluginServiceProvider
{
    public function boot()
    {
        $this->loadTextDomain();
        $this->registerHooks();
        $this->registerAdminPages();
        $this->registerFrontendPages();
    }

    public function loadTextDomain()
    {
        load_plugin_textdomain('mojar', false, MOJAR_PATH . '/languages');
    }

    public function registerHooks()
    {
        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);
    }

    public function activate()
    {
        // code for activation
    }

    public function deactivate()
    {
        // code for deactivation
    }

    public function registerAdminPages()
    {
        new \Mojar\Http\Controllers\AdminController();
        add_action('admin_init', [$this, 'registerSettings']);
    }

    public function registerFrontendPages()
    {
        new \Mojar\Http\Controllers\FrontendController();
    }

    public function registerSettings()
    {
        register_setting('mojar_settings', 'mojar_option');
        add_settings_section('mojar_settings_section', __('Mojar Settings', 'mojar'), [$this, 'settingsSection'], 'mojar');
        add_settings_field('mojar_option', __('Mojar Option', 'mojar'), [$this, 'settingsField'], 'mojar', 'mojar_settings_section');
    }

    public function settingsSection()
    {
        echo '<p>' . __('This is a description for the settings section', 'mojar') . '</p>';
    }
}