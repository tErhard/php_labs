<?php

class Repository
{
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function createPeoples($array)
    {
        $this->dbh->query('INSERT INTO Peoples(full_name, sex, born, education, date_of_registration) VALUES (' .
            "'" . $array['full_name'] . "', " .
            "'" . $array['sex'] . "', " .
            "'" . $array['born'] . "', " .
            "'" . $array['education'] . "', " .
            "'" . $array['speciality'] . "', " .
            "'" . $array['date_of_registration'] . "')"
        );
    }

    public function readPeoples()
    {
        return $this->dbh->query('SELECT * FROM Peoples')->fetchAll();
    }

    public function updatePeople($array)
    {
        $this->dbh->query('UPDATE Clients SET ' .
            'full_name = ' . $array['full_name'] . ', ' .
            'sex = ' . $array['sex'] . ', ' .
            'born = ' . $array['born'] . ', ' .
            'education = ' . $array['education'] . ', ' .
            'speciality = ' . $array['speciality'] . ' , ' .
            'date_of_registration = ' . $array['date_of_registration'] . ' ' .
            'WHERE id = ' . $array['id']);
    }

    public function deletePeople($array)
    {
        return $this->dbh->query('DELETE FROM Peoples WHERE id = ' . $array['id']);
    }
}
