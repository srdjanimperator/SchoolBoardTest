<?php


class CriteriaBiggestGreaterThan8 implements ICriteria
{
    public $name = "biggest_greater_than_8";

    public function passed($grades)
    {
        if (count($grades) === 0) {
            return false;
        }

        $max = 0;
        foreach ($grades as $grade) {
            if($grade > $max) {
                $max = $grade;
            }
        }

        return $max > 8;
    }
}