<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['desc'];

    $sql = "INSERT into categories (name,description)  values ('$name','$desc')";
    $res = $conn->query($sql);
    if ($res) {
        header("Location: ../../manage_category.php");
    } else {
        echo "Error while inserting data : " . $conn->error;
    }
}
