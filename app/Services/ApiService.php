<?php

namespace Mojar\Services;

class ApiService
{
    public function __construct(protected $apiUrl)
    {
    }

    public function fetchData($endpoint, $params = [])
    {
        $url = $this->apiUrl . $endpoint;
        $url = add_query_arg($params, $url);
        $response = wp_remote_get($url);
        if (is_wp_error($response)) {
            return $response->get_error_message();
        }
        return json_decode(wp_remote_retrieve_body($response));
    }

    public function postData($endpoint, $params = [])
    {
        $url = $this->apiUrl . $endpoint;
        $response = wp_remote_post($url, [
            'body' => json_encode($params),
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);
        if (is_wp_error($response)) {
            return $response->get_error_message();
        }
        return json_decode(wp_remote_retrieve_body($response), true);
    }



    // public static function get($url, $params = [])
    // {
    //     $url = add_query_arg($params, $url);
    //     $response = wp_remote_get($url);
    //     if (is_wp_error($response)) {
    //         return $response->get_error_message();
    //     }
    //     return wp_remote_retrieve_body($response);
    // }

    // public static function post($url, $params = [])
    // {
    //     $response = wp_remote_post($url, [
    //         'body' => $params
    //     ]);
    //     if (is_wp_error($response)) {
    //         return $response->get_error_message();
    //     }
    //     return wp_remote_retrieve_body($response);
    // }
}