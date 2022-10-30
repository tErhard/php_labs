<?php

class Repository
{
    public static function savePeoples($array)
    {
        $file = fopen("peoples.txt", "w");
        fwrite($file, serialize($array));
        fclose($file);
    }

    public static function loadPeoples()
    {
        return unserialize(file_get_contents("peoples.txt"));
    }
}
