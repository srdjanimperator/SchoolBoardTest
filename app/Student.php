<?php

class Student
{
    public $id;
    public $name;
    public $school_board_id;

    public function __construct($id, $name, $school_board_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->school_board_id = $school_board_id;
    }

    public static function getById($id)
    {
        $id = (int) $id;
        $query = "SELECT * FROM student WHERE id = :id";

        try {
            $db = Connection::get();
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die ($e->getMessage());
        }

        if(empty($row)) {
            return null;
        }

        return new Student($row['id'], $row['name'], $row['school_board_id']);
    }

    public function save()
    {
        $query = "INSERT INTO student (name, school_board_id) VALUES (:name, :school_board_id)";

        try {
            $db = Connection::get();
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':school_board_id', $this->school_board_id, PDO::PARAM_INT);
            $status = $stmt->execute();
        } catch (PDOException $e) {
            die ($e->getMessage());
        }

        return $status;
    }

    public function grades()
    {
        $query = "SELECT grade FROM student_grades WHERE student_id = :id";

        try {
            $db = Connection::get();
            $stmt = $db->prepare($query);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->execute();
            $grades = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $grades[] = (int)$row['grade'];
            }
        } catch (PDOException $e) {
            die ($e->getMessage());
        }

        return $grades;
    }

}
