<?php


class CriteriaBiggestGreaterThan8 implements ICriteria
{

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