<?php 
namespace Mojar\Http\Controllers;

use Mojar\Helpers\View;

class FrontendController{
    
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'loadScripts']);
    }
    
    public function loadScripts() {
        wp_enqueue_script('mojar', MOJAR_URL . '/public/assets/js/mojar.js', ['jquery'], null, true);
        wp_enqueue_style('mojar', MOJAR_URL . '/public/assets/css/mojar.css');
    }
    
}