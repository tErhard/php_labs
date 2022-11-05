<?php

class StudentsCollection
{
    public $students;

    public function __construct()
    {
    }

    public function defaultStudents()
    {
        $this->students = [
            new Student(1, [
                'id' => 1,
                'full_name' => 'Brovdi V.M. ',
                'course' => '2',
                'speciality' => 'System Analysis',
            ]),
            new Student(2, [
                'id' => 2,
                'full_name' => 'Jovbak N.I.',
                'course' => '2',
                'speciality' => 'System Analysis',
            ]),
            new Student(3, [
                'id' => 3,
                'full_name' => 'Milyuchenko O.A.',
                'course' => '2',
                'speciality' => 'System Analysis',
            ]),
            new Student(4, [
                'id' => 4,
                'full_name' => 'Nechay L.V.',
                'course' => '2',
                'speciality' => 'System Analysis',
            ]),
            new Student(5, [
                'id' => 5,
                'full_name' => 'Telinher E.M.Zh.',
                'course' => '2',
                'speciality' => 'System Analysis',
            ])
        ];
        return $this;
    }

    public function getStudentById($id)
    {
        foreach ($this->students as $student) {
            if ($student->id == $id) {
                return $student;
            }
        }
        return null;
    }

    public function sortStudents($born)
    {
        foreach($this->students as $student) {
            foreach ($student as $key => $value) {
                if (!isset($sortArray[$key])) {
                    $sortArray[$key] = array();
                }
                $sortArray[$key][] = $value;
            }
        }
    }

    public function displayStudents()
    {
        $table = '<table>';
        $table .= "<caption> Students </caption>";
        $table .= '<tr> <th>id</th> <th>full_name</th> <th>course</th> <th>speciality</th> </tr>';

        foreach ($this->students as $item) {
            $table .= "<tr><td>$item->id</td><td>$item->full_name</td>" .
                "<td>$item->course</td><td>$item->speciality</td></tr>";
        }

        $table .= '</table>';
        return $table;
    }

    public function displaySortedStudents($born)
    {
        $array = $this->sortStudents($born);
        $table = '<table>';
        $table .= "<caption> Students </caption>";
        $table .= '<tr> <th>id</th> <th>full_name</th> <th>course</th> <th>speciality</th> </tr>';

        foreach ($array as $item) {
            $table .= "<tr><td>$item->id</td><td>$item->full_name</td>" .
                "<td>$item->course</td><td>$item->speciality</td></tr>";
        }

        $table .= '</table>';
        return $table;
    }

}
