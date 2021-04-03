<?php
include "icon.php";
include "query.php";
$writer_tb = query("SELECT * FROM writer_tb");

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
    <div class="container mt-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name writer</th>
                    <th scope="col">email</th>
                    <th scope="col">no hp</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($writer_tb as $writer) : ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $writer["name"] ?></td>
                        <td><?= $writer["email"] ?></td>
                        <td><?= $writer["no_hp"] ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="updateWriter.php?id=<?= $writer["id"] ?>" type="button" class="btn btn-danger"><?= iconEdit() ?></a>
                                <a href="deleteWriter.php?id=<?= $writer["id"] ?>" type="button" class="btn btn-warning" onclick="return confirm('Anda yakin mau menghapusnya?')"><?= iconDelete() ?></a>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>