<?php

// require_once("./employeeManager.php");
if (isset($_GET["getEmployees"])) {
    $result = listEmployee();

    echo json_encode($result);
}

if (isset($_GET["edit"])) {
    updateEmployee($_GET["edit"]);
}

// if(isset($_POST["createEmployees"])){
//     $info = $_REQUEST;
//     unset($data["submit"]);
//     addEmployee($data);
// }

if (isset($_GET["delete"])) {
    deleteEmployee($_GET["delete"]);
}

if (isset($_GET["editEmployee"])) {
    header("Location: ../employee.php?editEmployee");
}

if (isset($_GET["id"])) {
    header('Location: ../employee.php?id=' + $_GET["id"]);
}

if (isset($_GET["add"])) {
    addEmployee($_POST);
}