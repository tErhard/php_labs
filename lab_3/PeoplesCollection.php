<?php

class PeoplesCollection
{
    public $peoples;

    public function __construct()
    {
    }

    public function defaultPeoples()
    {
        $this->peoples = [
            new People(1, [
                'id' => 1,
                'full_name' => 'Baker B.',
                'sex' => 'M',
                'born' => 1905,
                'education' => 'bachelor',
                'speciality' => 'System Analysis',
                'date_of_registration' => '09.08.2014',
            ]),
            new People(2, [
                'id' => 2,
                'full_name' => 'Hall R.',
                'sex' => 'M',
                'born' => 2003,
                'education' => 'bachelor',
                'speciality' => 'System Analysis',
                'date_of_registration' => '13.08.2022',
            ]),
            new People(3, [
                'id' => 3,
                'full_name' => 'Cole T.',
                'sex' => 'M',
                'born' => 1999,
                'education' => 'master',
                'speciality' => 'System Analysis',
                'date_of_registration' => '22.08.2008',
            ]),
            new Peoples(4, [
                'id' => 4,
                'full_name' => 'Smith S.',
                'sex' => 'M',
                'born' => 1988,
                'education' => 'bachelor',
                'speciality' => 'System Analysis',
                'date_of_registration' => '14.08.2007',
            ]),
            new People(4, [
                'id' => 5,
                'full_name' => 'Perry O.',
                'sex' => 'W',
                'born' => 2001,
                'education' => 'master',
                'speciality' => 'System Analysis',
                'date_of_registration' => '17.08.2021',
                ])
        ];
        return $this;
    }

    public function getPeopleById($id)
    {
        foreach ($this->peoples as $people) {
            if ($people->id == $id) {
                return $people;
            }
        }
        return null;
    }

    public function filterPeoples($born)
    {
        return array_filter(
            $this->peoples,
            function ($value) use ($born) {
                return ($value["born"] <= 1957 );
            }
        );
    }

    public function addPeoples($people)
    {
        $this->peoples[] = $people;
    }

    public function editPeople($array)
    {
        $people = $this->getPeopletById($array['id']);
        if (!(empty($people))) {
            $people->name = $array['id'];
            $people->education = $array['education'];
            $people->speciality = $array['speciality'];
            $people->date_of_registration = $array['date_of_registration'];
        }
    }

    public function savePeoples()
    {
        $file = fopen("peoples.txt", "w");
        fwrite($file, serialize($this->peoples));
        fclose($file);
    }

    public function loadPeoples()
    {
        $this->peoples = unserialize(file_get_contents("peoples.txt"));
    }

    public function displayPeoples()
    {
        $table = '<table>';
        $table .= "<caption> Peoples </caption>";
        $table .= '<tr> <th>id</th> <th>full_name</th> <th>sex</th> <th>born</th> <th>education</th> <th>speciality</th> <th>date_of_registration</th> </tr>';

        foreach ($this->peoples as $item) {
            $table .= "<tr><td>$item->id</td><td>$item->full_name</td><td>$item->sex</td><td>$item->born</td>" .
                "<td>$item->education</td><td>$item->speciality</td><td>$item->date_of_registration</td></tr>";
        }

        $table .= '</table>';
        return $table;
    }

    public function displayFilteredPeoples($born)
    {
        $array = $this->filterPeoples($born);
        $table = '<table>';
        $table .= "<caption> Peoples </caption>";
        $table .= '<tr> <th>id</th> <th>full_name</th> <th>sex</th> <th>born</th> <th>education</th> <th>speciality</th> <th>date_of_registration</th> </tr>';

        foreach ($array as $item) {
            $table .= "<tr><td>$item->id</td><td>$item->full_name</td><td>$item->sex</td><td>$item->born</td>" .
                "<td>$item->education</td><td>$item->speciality</td><td>$item->date_of_registration</td></tr>";
        }

        $table .= '</table>';
        return $table;
    }

}
