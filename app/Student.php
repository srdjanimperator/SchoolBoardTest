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

}
