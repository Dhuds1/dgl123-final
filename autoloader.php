<?php
spl_autoload_register(function ($class) {
    // Define the base directory where your classes are located
    $baseDir = __DIR__ . '/classes/';

    // Replace namespace backslashes with directory separators
    $class_file = $baseDir . str_replace('\\', '/', $class) . '.php';

    // Check if the class file exists, and include it if it does
    if (file_exists($class_file)) {
        require $class_file;
    }
});

// Now, when you create an instance of a class, the autoloader will automatically load the class file if it exists in the specified directory.
