<?php


class StudentController extends BaseController
{
    public function getById(Request $request)
    {
        // var_dump($request);
        if(!array_key_exists('id', $request->path())) {
            $this->response(400);
        }

        $student = Student::getById($request->path()['id']);

    }

    public function create()
    {

    }
}