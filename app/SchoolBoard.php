<?php


class SchoolBoard
{
    public $criteria;
    public $formater;

    private function __construct(ICriteria $criteria, IFormater $formater)
    {
        $this->criteria = $criteria;
        $this->formater = $formater;
    }

    public function calcStudentSuccess(Student $student)
    {
        $grades = $student->grades();
        $passed = $this->criteria->passed($grades);

        return new StudentSuccess($student->id, $student->name, $grades, $passed);
    }

    public static function getSchoolBoard($school_board_id)
    {
        $res = self::getById($school_board_id);

        $name = $res['name'];
        $criteria = null;
        foreach (CRITERIAS as $key => $criteriaClass) {
            if($key === $name) {
                $criteria = new $criteriaClass();
            }
        }

        $format = $res['format'];
        $formater = null;
        switch ($format) {
            case 'xml':
                $formater = new XMLFormater();
                break;
            default:
                $formater = new JSONFormater();
        }

        return new SchoolBoard($criteria, $formater);
    }

    public static function getById($id)
    {
        $id = (int) $id;
        $query = "SELECT sb.*, c.name FROM school_board sb JOIN criteria c ON sb.criteria_id = c.id WHERE sb.id = :id";

        try {
            $db = Connection::get();
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die ($e->getMessage());
        }

        return $row;
    }
}