<?php

class Display
{
    public static function displayPeoples($array)
    {
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
