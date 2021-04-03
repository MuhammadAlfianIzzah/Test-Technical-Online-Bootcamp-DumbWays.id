<?php
include_once("config.php");
$con = $setting;
if (!empty($_POST)) {

    $nama = $_POST["nama_category"];
    $result = mysqli_query($con, "INSERT INTO category_tb VALUES(NULL,'$nama')");

    if (mysqli_affected_rows(($con))) {
        header("Location: index.php");
    }
}
