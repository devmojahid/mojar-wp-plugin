<?php
namespace Mojar\Helpers;

class View
{
    public static function render($view, $data = [])
    {
        $view = str_replace('.', '/', $view);
        $view = MOJAR_PATH . '/views/' . $view . '.php';
        if (file_exists($view)) {
            extract($data);
            require $view;
        }else{
            wp_die(__('View file not found', 'mojar').': '.$view);
        }
    }
}