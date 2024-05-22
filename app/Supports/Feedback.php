<?php

namespace Mojar\Supports;

use Mojar\Helpers\View;

class Feedback
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'registerSettingsPage']);
    }

    public function registerSettingsPage()
    {
        add_submenu_page(
            'mojar',
            __('Feedback', 'mojar'),
            __('Feedback', 'mojar'),
            'manage_options',
            'mojar-feedback',
            [$this, 'feedbackPage']
        );
    }

    public function feedbackPage()
    {
        View::render('admin.feedback-page');
    }
}