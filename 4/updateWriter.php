<?php

include "config.php";
include "query.php";
$con = $setting;
if (!isset($_GET["id"])) {
    return header("Location: index.php");
}
$id_writer = $_GET["id"];
$writer_tb = query("SELECT * FROM writer_tb  WHERE id = $id_writer")[0];
if (!empty($_POST)) {
    $name = $_POST["nama"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];
    $result = mysqli_query($con, "UPDATE writer_tb SET name='$name',email='$email',no_hp=$no_hp WHERE id=$id_writer");

    // Redirect to homepage to display updated user in list
    header("Location: penulis.php?id=$id_writer");
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Dumb Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="penulis.php">Daftar Penulis</a>
                    <a class="nav-link" href="category.php">Daftar category</a>

                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">

            <div class="col-5 border">

                <form method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Penulis</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $writer_tb["name"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email Penulis</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $writer_tb["email"] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">no_hp Penulis</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $writer_tb["no_hp"] ?>" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;">
                    </div>
                    <button class="btn btn-primary">submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>