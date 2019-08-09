<?php


class StudentSuccess
{
    public $id;
    public $name;
    public $grades;
    public $passed;

    public function __construct($id, $name, $grades = [], $passed = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->grades = $grades;
        $this->passed = $passed;
    }
}