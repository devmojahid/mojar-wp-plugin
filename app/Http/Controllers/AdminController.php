<?php

namespace Mojar\Http\Controllers;

use Mojar\Helpers\View;

class AdminController
{

    public function __construct()
    {
        add_action('admin_menu', [$this, 'registerSettingsPage']);
    }

    public function registerSettingsPage()
    {
        add_menu_page(
            __('Mojar', 'mojar'),
            __('Mojar', 'mojar'),
            'manage_options',
            'mojar',
            [$this, 'settingsPage'],
            'dashicons-admin-generic',
            20
        );
    }

    public function settingsPage()
    {
        View::render('admin.settings-page');
    }
}