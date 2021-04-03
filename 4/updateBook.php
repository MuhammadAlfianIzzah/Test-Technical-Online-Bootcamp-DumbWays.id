<?php

include "config.php";
$con = $setting;
if (!empty($_POST)) {
    $name = $_POST["nama"];
    $id = $_POST["id_book"];
    $cI = $_POST["category"];
    $wI = $_POST["writer"];
    $year = $_POST["year"];
    $img = "img";
    $result = mysqli_query($con, "UPDATE book_tb SET name='$name',category_id='$cI',writer_id='$wI',Publication_year='$year' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: detail.php?id=$id");
}
