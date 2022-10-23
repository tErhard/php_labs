<?php

include "People.php";
include "PeoplesCollection.php";

if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION['Peoples'])) {
    $_SESSION['Peoples'] = new PeoplesCollection();
    $_SESSION['Peoples']->defaultPeoples();
}

$actionToDo = $_POST['action'];

if ($actionToDo == 'add') {
    if (People::validationDataPeoples($_POST)) {
        $_SESSION['Peoples']->addPeople(
            new People(5, $_POST)
        );
    }
} elseif ($actionToDo == 'edit') {
    if (People::validationDataPeoples($_POST)) {
        $_SESSION['Peoples']->editPeople(
            $_POST
        );
    }
} elseif ($actionToDo == 'filter') {
    echo $_SESSION['Peoples']->displayFilteredPeoples($_POST['born']);
} elseif ($actionToDo == 'save') {
    $_SESSION['Peoples']->savePeoples();
} elseif ($actionToDo == 'load') {
    $_SESSION['Peoples']->loadPeoples();
}

echo $_SESSION['Peoples']->displayPeoples();
?>
<br>

<button onclick="ShowAddForm()"> Add</button>
<button onclick="ShowEditForm()"> Edit</button>
<button onclick="ShowFilterForm()"> Filter</button>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='addForm'>
    Add <br>
    <label> full_name:
        <input type='text' name='full_name'>
    </label><br>
    <label> sex:
        <input type='text' name='sex'>
    </label><br>
    <label> born:
        <input type='number' name='born'>
    </label><br>
    <label> education:
        <input type='text' name='education'>
    </label><br>
    <label> speciality:
        <input type='text' name='speciality'>
    </label><br>
    <label> date_of_registration:
        <input type='text' name='date_of_registration'>
    </label><br>
    <input type='hidden' name='action' value='add'>
    <input type='submit'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='editForm'>
    Edit <br>
    <label> id:
        <input type='number' name='id'>
    </label><br>
    <label> full_name:
        <input type='text' name='full_name'>
    </label><br>
    <label> sex:
        <input type='text' name='sex'>
    </label><br>
    <label> born:
        <input type='number' name='born'>
    </label><br>
    <label> education:
        <input type='text' name='education'>
    </label><br>
    <label> speciality:
        <input type='text' name='speciality'>
    </label><br>
    <label> date_of_registration:
        <input type='text' name='date_of_registration'>
    </label><br>
    <input type='hidden' name='action' value='edit'>
    <input type='submit'>
</form>

<br>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='filterForm'>
    Filter <br>
    <label> full_name:
        <input type='text' name='full_name'>
    </label><br>
    <label> born:
        <input type='number' name='born'>
    </label><br>
    <input type='hidden' name='action' value='filter'>
    <input type='submit'>
</form>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='save'>
    <input type='hidden' name='action' value='save'>
    <input type='submit' value='Save to file'>
</form>

<form action='<?= $_SERVER['PHP_SELF'] ?>' method='post' id='load'>
    <input type='hidden' name='action' value='load'>
    <input type='submit' value='Upload from file'>
</form>

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

    function ShowFilterForm() {
        document.querySelector('#filterForm').style.display = 'inline';
    }
</script>
