<?php

class People
{
    public $id;
    public $full_name;
    public $sex;
    public $born;
    public $education;
    public $speciality;
    public $date_of_registration;

    public function __construct($id, $array)
    {
        $this->id = $id;
        $this->full_name = $array['full_name'];
        $this->sex = $array['sex'];
        $this->born = $array['born'];
        $this->education = $array['education'];
        $this->speciality = $array['speciality'];
        $this->date_of_registration = $array['date_of_registration'];
    }

    public static function validationDataClients($array)
    {
        return !(
            empty($array['full_name']) ||
            empty($array['sex']) ||
            empty($array['born']) ||
            empty($array['education']) ||
            empty($array['speciality']) ||
            $array['born'] < 0 ||
            $array['date_of_registration'] < 0 ||
            !isset($array)
        );
    }
}
