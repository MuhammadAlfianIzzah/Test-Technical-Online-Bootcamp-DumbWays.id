<?php
include_once("config.php");
$con = $setting;
if (!empty($_POST)) {
    $ekstensi = explode("/", $_FILES["gambar"]["type"])[1];
    $nama = $_POST["nama"];
    // ambil data file
    $namaFile = $nama . "." . $ekstensi;
    $namaSementara = $_FILES['gambar']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $directory = "img/";

    // pindahkan file
    $terupload = move_uploaded_file($namaSementara, $directory . $namaFile);

    if (!$terupload) {
        echo "Upload Gagal!";
    }


    $category = $_POST["category"];
    $writer = $_POST["writer"];
    $year = $_POST["year"];
    $result = mysqli_query($con, "INSERT INTO book_tb VALUES(NULL,'$nama','$category','$writer','$year','$namaFile')");
    if (mysqli_affected_rows(($con))) {
        header("Location: index.php");
    }
}
