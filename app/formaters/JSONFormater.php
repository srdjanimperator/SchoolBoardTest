<?php


class JSONFormater implements IFormater
{

    public function format($data)
    {
        return json_encode($data);
    }
}