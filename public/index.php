<?php
function getTableRow($userData)
{
    $columnData = explode(',', $userData);

    if (sizeof($columnData) < 4) {
        return '';
    }

    $row = '<tr>';
    foreach ($columnData as $data) {
        $row .= "<th scope=\"col\">$data</th>";
    }
    $row .= '</tr>';
    return $row;
}

function getTableBody($tableData)
{
    $tableBody = '<tbody>';
    foreach ($tableData as $row) {
        $tableBody .= getTableRow($row);
    }
    $tableBody .= '</tbody>';
    return $tableBody;
}

$usersList = explode(';', file_get_contents('./data'));
$tbody = getTableBody($usersList)
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<div class="container pt-5">
    <h1>Users Table</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">email</th>
            <th scope="col">name</th>
            <th scope="col">role</th>
        </tr>
        </thead>
        <?=$tbody?>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
