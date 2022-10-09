<?php
function defaultDataPeoples() {
    return [
        [
            'id' => 1,
            'full_name' => 'Baker B.',
            'sex' => 'M',
            'born' => 1905,
            'education' => 'bachelor',
            'speciality' => 'System Analysis',
            'date_of_registration' => '09.08.2014',
        ],
        [
            'id' => 2,
            'full_name' => 'Hall R.',
            'sex' => 'M',
            'born' => 2003,
            'education' => 'bachelor',
            'speciality' => 'System Analysis',
            'date_of_registration' => '13.08.2022',
        ],
        [
            'id' => 3,
            'full_name' => 'Cole T.',
            'sex' => 'M',
            'born' => 1999,
            'education' => 'master',
            'speciality' => 'System Analysis',
            'date_of_registration' => '22.08.2008',
        ],
        [
            'id' => 4,
            'full_name' => 'Smith S.',
            'sex' => 'M',
            'born' => 1988,
            'education' => 'bachelor',
            'speciality' => 'System Analysis',
            'date_of_registration' => '14.08.2007',
        ],
        [
            'id' => 5,
            'full_name' => 'Perry O.',
            'sex' => 'W',
            'born' => 2001,
            'education' => 'master',
            'speciality' => 'System Analysis',
            'date_of_registration' => '17.08.2021',
        ]
    ];
}

function CreateNewPeoples($array, $id) {
    return [
        'id' => $id,
        'full_name' => $array['full_name'],
        'sex' => $array['sex'],
        'born' => $array['born'],
        'education' => $array['education'],
        'speciality' => $array['speciality'],
        'date_of_registration' => $array['date_of_registration'],
    ];
}

function validationDataPeoples($array) {
    return !(
        empty($array['full_name']) ||
        empty($array['sex']) ||
        empty($array['born']) ||
        empty($array['education']) ||
        empty($array['speciality']) ||
        empty($array['date_of_registration']) ||
        $array['born'] < 0 ||
        $array['date_of_registration'] < 0 ||
        !isset($array)
    );
}

function filterByBorn($arr, $born) {
    return array_filter($arr,
        function ($value) use ($born) {
            return ($value["born"] <= 1957 );
        });
}

function displayTablePeoples($array, $caption)
{
    $table = '<table>';
    $table .= "<caption> $caption </caption>";
    $table .= '<tr> <th>id</th> <th>full_name</th> <th>sex</th> <th>born</th> <th>education</th> <th>speciality</th> <th>date_of_registration</th> </tr>';

    foreach ($array as $item) {
        $table .= "<tr>" .
            "<td>$item[id]</td><td>$item[full_name]</td><td>$item[sex]</td><td>$item[born]</td>" .
            "<td>$item[education]</td><td>$item[speciality]</td><td>date_of_registration</td>" .
            "</tr>";
    }

    $table .= '</table>';
    echo $table;
}

session_start();

// setting default values
if (empty($_SESSION)) {
    $_SESSION['Peoples'] = defaultDataPeoples();
}

// adding people
if ($_POST['action'] == 'add'){
    if (validationDataPeoples($_POST)) {
        $nextPeopleId = count($_SESSION['Peoples']) + 1;
        $_SESSION['Peoples'][] = CreateNewPeoples($_POST, $nextPeopleId);
    }
}

// editing peoples
if ($_POST['action'] == 'edit'){
    if (validationDataPeoples($_POST)) {
        $idToEdit = $_POST['id'];
        foreach ($_SESSION['Peoples'] as $key => $value) {
            if ($value['id'] == $idToEdit) {
                $_SESSION['Peoples'][$key] = CreateNewPeoples($_POST, $idToEdit);
                break;
            }
        }
    }
}

// filtering peoples
if ($_POST['action'] == 'filter'){
    displayTablePeoples(
        filterByBorn($_SESSION['Peoples'], $_POST['born'] ), 'Unemployed people of retirement age'
    );
}

// display all peoples
displayTablePeoples($_SESSION['Peoples'], 'Peoples');
?>
<br>

<button onclick="ShowAddForm()"> Add </button>
<button onclick="ShowEditForm()"> Edit </button>
<button onclick="ShowFilterForm()"> Filter </button>

<br>

<form action='<?= $_SERVER['PHP_SELF']?>' method='post' id='addForm'>
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

<form action='<?= $_SERVER['PHP_SELF']?>' method='post' id='editForm'>
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

<form action='<?= $_SERVER['PHP_SELF']?>' method='post' id='filterForm'>
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
        height: 50px;s
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