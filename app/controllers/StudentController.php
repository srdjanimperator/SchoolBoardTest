<?php


class StudentController extends BaseController
{
    public function get(Request $request)
    {
        $this->response(200,"Not yet implemented");
    }

    public function getById(Request $request)
    {
        if(!array_key_exists('id', $request->path())) {
            $this->response(400);
        }

        $student = Student::getById($request->path()['id']);
        if(empty($student)) {
            return $this->response(404);
        }
        $schoolBoard = SchoolBoard::getSchoolBoard($student->school_board_id);
        $studentSuccess = $schoolBoard->calcStudentSuccess($student);
        $raw = $schoolBoard->formater->format($studentSuccess);

        $this->response(200, $raw);
    }

    public function create(Request $request)
    {
        $data = $request->body();
        if(!isset($data['name'])) {
            return $this->response(400, json_encode(['error' => 'Name is required']));
        }
        if(!isset($data['school_board_id'])) {
            return $this->response(400, json_encode(['error' => 'School Board is required']));
        }
        $name = filter_var($data['name'], FILTER_SANITIZE_STRING);
        if(!$name) {
            return $this->response(400, json_encode(['error' => 'Name is not valid']));
        }
        $sb_id = filter_var($data['school_board_id'], FILTER_SANITIZE_NUMBER_INT);
        if(!$sb_id) {
            return $this->response(400, json_encode(['error' => 'School Board is not valid']));
        }

        $s = new Student(null, $name, $sb_id);
        $s->save();

        return $this->response(201, json_encode($s));
    }
}