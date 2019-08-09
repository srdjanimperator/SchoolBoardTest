<?php


class SchoolBoard
{
    public $criteria;
    public $formater;

    public function __construct(ICriteria $criteria, IFormater $formater)
    {
        $this->criteria = $criteria;
        $this->formater = $formater;
    }
}