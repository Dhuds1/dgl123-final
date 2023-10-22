<?php
// Create a Route
class Route {
    public static $valid_routes = array();

    public static $page_title;
    public static function set($route, $function) {
        self::$valid_routes[] = $route;

        if ($route === self::current_page()) {
            $function();
        }
    }

    public static function current_page() {
        $current_url = $_SERVER['REQUEST_URI'];
        $url_parts = explode('/', $current_url);
        $page_name = end($url_parts);

        if (empty($page_name)) {
            $page_name = 'index';
        }

        return $page_name;
    }
}

