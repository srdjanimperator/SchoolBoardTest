<?php


class BaseController
{
    private $db;

    public function response($code, $raw_response_body = null)
    {
        http_response_code($code);

        if ($raw_response_body === null) {
            return;
        }

        echo $raw_response_body;
    }

}