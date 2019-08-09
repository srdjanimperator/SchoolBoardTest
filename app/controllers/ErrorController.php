<?php


class ErrorController extends BaseController
{
    public function notFound()
    {
        $this->response(404);
    }
}