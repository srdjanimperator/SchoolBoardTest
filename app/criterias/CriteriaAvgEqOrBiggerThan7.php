<?php


class CriteriaAvgEqOrBiggerThan7 implements ICriteria
{

    public function passed($grades)
    {
        $len = count($grades);

        if ($len === 0) {
            return false;
        }

        $avg = (array_sum() * 1.0) / $len;

        return $avg >= 7.0;
    }
}