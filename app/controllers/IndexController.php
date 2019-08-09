<?php


class IndexController extends BaseController
{
    public function exposeApi()
    {
        $this->response(200, json_encode(['api' => ROUTES]));
    }
}