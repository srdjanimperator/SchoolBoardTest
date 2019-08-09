<?php

class Request
{
    private $body;
    private $path;
    private $query;

    public function __construct($body = null, $path = null, $query = null)
    {
        $this->body = $body;
        $this->path = $path;
        $this->query = $query;
    }

    public function body()
    {
        return $this->body;
    }

    public function path()
    {
        return $this->path;
    }

    public function query()
    {
        return $this->query;
    }

}