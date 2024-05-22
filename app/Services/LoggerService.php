<?php

namespace Mojar\Services;

class LoggerService
{
    public static function log($message)
    {
        if (defined('WP_DEBUG') && WP_DEBUG === false) return;
        if (!file_exists(MOJAR_PATH . '/logs')) {
            mkdir(MOJAR_PATH . '/logs', 0777, true);
        }
        error_log($message);
        $log = MOJAR_PATH . '/logs/' . date('Y-m-d') . '.log';
        $message = date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL;
        file_put_contents($log, $message, FILE_APPEND);
    }

    public static function logError($message)
    {
        self::log('[ERROR] ' . $message);
    }

    public static function logInfo($message)
    {
        self::log('[INFO] ' . $message);
    }
}