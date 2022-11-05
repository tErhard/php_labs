<?php

include "Student.php";
include "StudentsCollection.php";

if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION['Students'])) {
    $_SESSION['Students'] = new StudentsCollection();
    $_SESSION['Students']->defaultStudents();
}

echo $_SESSION['Students']->displayStudents();
?>
<br>

<button onclick="ShowSortForm()"> Sort</button><br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='sortForm'>
    Sort <br>
    <input type='hidden' name='action' value='sort'>
    <input type='submit'>
</form>

<style>

    #sortForm {
        display: none;
    }

    table, th, td {
        border: 1px solid;
        text-align: center;
    }

    th {
        width: 100px;
    }

    td {
        height: 50px;
    }
</style>

<script>

    function ShowSortForm() {
        document.querySelector('#sortForm').style.display = 'inline';
    }
</script>
