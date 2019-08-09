<?php


class StudentSuccess
{
    public $id;
    public $name;
    public $grades;
    public $average = 0;
    public $passed;

    public function __construct($id, $name, $grades = [], $passed = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->grades = $grades;
        $this->passed = $passed;
        if (count($grades) !== 0) {
            $this->average = round((array_sum($grades) * 1.0) / count($grades), 2);
        }
    }
}