<?php
class Route {
    public static $valid_routes = array();

    public static $page_title;

    public static function set($route, $function) {
        self::$valid_routes[] = $route;

        if ($route === self::current_page()) {
            $function();
        } else {
            // Check if the file exists for the requested page and handle 404 errors if necessary.
            if (!self::page_exists($route)) {
                self::redirect_to_404();
            }
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

    public static function page_exists($route) {
        $current_page = self::current_page();
        // Check if the page file exists
        return file_exists($current_page . '.php');
    }

    public static function redirect_to_404() {
        // Set the 404 page title
        self::$page_title = "404 Not Found";

        // Include your custom 404 error page (error.html)
        include "error.php";

        // Exit to prevent further processing
        exit;
    }
}
