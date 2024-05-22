<?php

namespace Mojar\Services;

class CacheService
{
    public static function get($key)
    {
        return get_transient($key);
    }

    public static function set($key, $value, $expiration = 0)
    {
        return set_transient($key, $value, $expiration);
    }

    public static function delete($key)
    {
        return delete_transient($key);
    }
}