<?php

function __autoload($class_name)
{
    $dirs = array(
        'lib/',
        'domainlib/',
        'domainlib/controllers/',
        'domainlib/criterias/',
        'domainlib/formaters/'
    );

    foreach ($dirs as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            require_once($directory . $class_name . '.php');
            return;
        }
    }
}

