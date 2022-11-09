<?php

include 'DBConnect.php';

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$peoplesRepository = new Repository($dbh);

if (!isset($_SESSION)) {
    session_start();
}

$actionToDo = $_POST['action'];

if ($actionToDo == 'add') {
    if (People::validationDataPeoples($_POST)) {
        $peoplesRepository->createPeople($_POST);
    }
} elseif ($actionToDo == 'edit') {
    if (People::validationDataPeoples($_POST)) {
        $peoplesRepository->updatePeople($_POST);
    }
} elseif ($actionToDo == 'delete') {
    $peoplesRepository->deletePeople($_POST);
}

echo Display::displayPeoples($peoplesRepository->readPeoples())
?>
<br>

<button onclick="ShowAddForm()"> Add</button>
<button onclick="ShowEditForm()"> Edit</button>
<button onclick="ShowDeleteForm()"> Delete</button>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='addForm'>
    Add <br>
    <label> full_name:
        <input type='text' full_name='full_name'>
    </label><br>
    <label> sex:
        <input type='text' name='sex'>
    </label><br>
    <label> born:
        <input type='number' born='born'>
    </label><br>
    <label> education:
        <input type='text' education='education'>
    </label><br>
    <label> speciality:
        <input type='text' speciality='speciality'>
    </label><br>
    <label> date_of_registration:
        <input type='text' date_of_registration='date_of_registration'>
    </label><br>
    <input type='hidden' name='action' value='add'>
    <input type='submit' value='add'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='editForm'>
    Edit <br>
    <label> id:
        <input type='number' name='id'>
    </label><br>
    <label> full_name:
        <input type='text' full_name='full_name'>
    </label><br>
    <label> sex:
        <input type='text' name='sex'>
    </label><br>
    <label> born:
        <input type='number' born='born'>
    </label><br>
    <label> education:
        <input type='text' education='education'>
    </label><br>
    <label> speciality:
        <input type='text' speciality='speciality'>
    </label><br>
    <label> date_of_registration:
        <input type='text' date_of_registration='date_of_registration'>
    </label><br>
    <input type='hidden' name='action' value='edit'>
    <input type='submit' value='edit'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='deleteForm'>
    Delete <br>
    <label> id:
        <input type='number' name='id'>
    </label><br>
    <input type='hidden' name='action' value='delete'>
    <input type='submit' value='delete'>
</form>

<br>

<style>
    #addForm {
        display: none;
    }

    #editForm {
        display: none;
    }

    #filterForm {
        display: none;
    }

    #deleteForm {
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
    function ShowAddForm() {
        document.querySelector('#addForm').style.display = 'inline';
    }

    function ShowEditForm() {
        document.querySelector('#editForm').style.display = 'inline';
    }

    function ShowDeleteForm() {
        document.querySelector('#deleteForm').style.display = 'inline';
    }

</script>
