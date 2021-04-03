<?php
include_once("config.php");
$con = $setting;
if (!empty($_POST)) {
    $nama = $_POST["nama_penulis"];
    $email = $_POST["email_penulis"];
    $no_hp = $_POST["no_hp"];

    $result = mysqli_query($con, "INSERT INTO writer_tb VALUES(NULL,'$nama','$email','$no_hp')");

    if (mysqli_affected_rows(($con))) {
        header("Location: index.php");
    }
}
