<?php
// include database connection file
include_once("config.php");

if (!isset($_GET["id"])) {
    return header("Location: index.php");
}
// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$result = mysqli_query($setting, "DELETE FROM category_tb WHERE id=$id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location: category.php");
