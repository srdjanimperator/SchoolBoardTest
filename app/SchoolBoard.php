<?php


class SchoolBoard
{
    public $criteria;
    public $formater;

    public function __construct($criteria, $formater)
    {
        $this->criteria = $criteria;
        $this->formater = $formater;
    }
}