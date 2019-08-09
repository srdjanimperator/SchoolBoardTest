<?php

include ROOT . "/config/db.php";
include ROOT . "/config/routes.php";
include ROOT . "/config/criteria.php";

class App
{
    function run()
    {
        $r = new Router();
        $url = $_SERVER["REQUEST_URI"];

        $url_resolved = $r->resolve($url);

        $controller = $url_resolved["controller"];
        $method = $url_resolved["method"];
        $request = $url_resolved["request"];

        $c = new $controller();
        $c->$method($request);
    }
}