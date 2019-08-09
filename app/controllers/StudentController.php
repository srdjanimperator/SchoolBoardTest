<?php


class StudentController extends BaseController
{
    public function getById(Request $request)
    {
        if(!array_key_exists('id', $request->path())) {
            $this->response(400);
        }

        $student = Student::getById($request->path()['id']);
        $schoolBoard = SchoolBoard::getSchoolBoard($student->school_board_id);
        $studentSuccess = $schoolBoard->calcStudentSuccess($student);
        $raw = $schoolBoard->formater->format($studentSuccess);

        $this->response(200, $raw);
    }

    public function create()
    {

    }
} 