<?php

class Student
{
    public $id;
    public $full_name;
    public $course;
    public $speciality;

    public function __construct($id, $array)
    {
        $this->id = $id;
        $this->full_name = $array['full_name'];
        $this->course = $array['course'];
        $this->speciality = $array['speciality'];
    }

    public static function validationDataStudents($array)
    {
        return !(
            empty($array['full_name']) ||
            empty($array['course']) ||
            empty($array['speciality']) ||
            !isset($array)
        );
    }
}
