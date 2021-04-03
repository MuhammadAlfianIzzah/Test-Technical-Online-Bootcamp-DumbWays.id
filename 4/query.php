<?php
include "config.php";
$connect = $setting; // koneksi database
function query($query)
{
    global $connect;
    $result =  mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
