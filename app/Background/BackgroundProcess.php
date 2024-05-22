<?php 
namespace Mojar\Background;

class BackgroundProcess{
    public function __construct() {
        add_action('mojar_background_task', [$this, 'handleBackgroundTask']);
    }

    public function handleBackgroundTask() {
        // Do something in the background
    }

    public function scheduleTask() {
        if (!wp_next_scheduled('mojar_background_task')) {
            // wp_schedule_single_event(time() + 10, 'mojar_background_task');
            wp_schedule_event(time(), 'hourly', 'mojar_background_task');
        }
    }

    public function unscheduleTask() {
        $timestamp = wp_next_scheduled('mojar_background_task');
        wp_unschedule_event($timestamp, 'mojar_background_task');
    }
}