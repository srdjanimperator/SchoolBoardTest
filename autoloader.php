<?php

function __autoload($class_name)
{
    $dirs = array(
        'lib/',
        'app/',
        'app/controllers/',
        'app/criterias/',
        'app/formaters/'
    );

    foreach ($dirs as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            require_once($directory . $class_name . '.php');
            return;
        }
    }
}

