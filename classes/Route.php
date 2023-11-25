<?php
class Route {
    public static $valid_routes = array();
    // This page title feature is depricated, as when loading out of the test enviorment caused the stylesheets to not load correclty on the index page. This is mainly due to the fact that there was no varibale being set at the beginning on page load, and no way of setting it asyncronously.
    // public static $page_title;

    public static function set($route, $function) {
        self::$valid_routes[] = $route;

        if ($route === self::current_page()) {
            $function();
        } else {
            if (!self::page_exists($route)) {
                self::redirect_to_404();
            }
        }
    }

    public static function current_page() {
        $current_url = $_SERVER['REQUEST_URI'];
        $url_parts = explode('/', $current_url);
    
        // Extract the path part (before ?) from the last segment
        $last_segment = end($url_parts);
        $parts = explode('?', $last_segment);
        $page_name = $parts[0];
    
        if (empty($page_name)) {
            $page_name = 'index';
        }
        return $page_name;
    }
    

    public static function page_exists($route) {
        // Check if the view file for the requested route exists
        $current_page = self::current_page();
        return file_exists($current_page . '.php');
    }

    public static function load_view() {
        // Define the directory where your view files are stored
        $route = self::current_page();

        // Load the view file for the requested route
        $view_file = "views/$route.php";
        if (file_exists($view_file)) {
            // Include the head.php file at the beginning
            include $view_file;
        }
    }
    public function get_name($name) {
        if($name){
            return $name;
        }
        else {
            self::redirect_to_404();
        }   
    }
    public static function redirect_to_404() {
        // Set the 404 page title

        // Include your custom 404 error page (error.html)
        include "error.php";

        // Exit to prevent further processing
        exit;
    }
    
}
