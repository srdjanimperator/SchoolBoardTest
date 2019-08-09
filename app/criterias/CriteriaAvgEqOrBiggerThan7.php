<?php


class CriteriaAvgEqOrBiggerThan7 implements ICriteria
{
    public $name = "average_equals_or_bigger_than_7";

    public function passed($grades)
    {
        $len = count($grades);

        if ($len === 0) {
            return false;
        }

        $avg = (array_sum($grades) * 1.0) / $len;

        return $avg >= 7.0;
    }
}