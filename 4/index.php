<?php
include "config.php";
include "icon.php";
include "query.php";
// $connect = mysqli_connect("localhost", "root", "", "toko");
$connect = $setting; // koneksi database
$book_tb = query("SELECT * FROM book_tb");

$category_tb = query("SELECT * FROM category_tb");
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
            <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                </svg> Dumb Library</a>
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
        <div class="row">
            <div class="col-3">
                <h3>Daftar buku</h3>
            </div>
            <div class="col-9 d-flex justify-content-end">
                <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#modalBook">
                    <?= iconPlus() ?> Add Book
                </button>
                <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#modalWriter">
                    <?= iconPlus() ?> Add writer
                </button>
                <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#modalCategory">
                    <?= iconPlus() ?> Add category
                </button>
            </div>
        </div>
        <div class="row mt-3">
            <?php foreach ($book_tb as $book) : ?>
                <div class="col-4">
                    <div class="card">
                        <?php
                        $img = $book["img"];

                        ?>
                        <img src="img/<?= (file_exists("img/$img")) ? "$img" : "default.jpg" ?>" class="card-img-top" alt="...">

                        <div class="card-body">
                            <h5 class="card-title"><?= $book["name"] ?></h5>
                            <a href="detail.php?id=<?= $book["id"] ?>" class="btn btn-primary w-100">View Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>








    <!-- Modal addbook -->
    <div class="modal fade" id="modalBook" tabindex="-1" aria-labelledby="modalBookLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBookLabel">Tambah Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="tambah.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama buku</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategory buku</label>
                            <select class="form-select" name="category" aria-label="Default select example" id="category" required>
                                <option value="" disabled selected>Pilih Kategory buku .....</option>
                                <?php foreach ($category_tb as $category) : ?>
                                    <option value="<?= $category["id"] ?>"><?= ucfirst($category["name"]) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="writer" class="form-label">Penulis buku</label>
                            <select name="writer" class="form-select" aria-label="Default select example" id="writer" required>
                                <option value="" disabled selected>Siapa penulis buku ini .....</option>
                                <?php foreach ($writer_tb as $writer) : ?>
                                    <option value="<?= $writer["id"] ?>"><?= $writer["name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="year">Tahun terbit</label>
                            <input type="number" name="year" class="form-control" min="2000" id="year" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" required />
                        </div>
                        <div class="mb-3">
                            <label for="book">Gambar Buku</label>
                            <input type="file" id="book" name="gambar" class="form-control">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal addWriter -->
    <div class="modal fade" id="modalWriter" tabindex="-1" aria-labelledby="modalWriterLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalWriterLabel">Tambah penulis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="tambahPenulis.php">
                        <div class="mb-3">
                            <label for="nama_penulis" class="form-label">Nama penulis</label>
                            <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_penulis" class="form-label">E-mail penulis</label>
                            <input type="email" class="form-control" id="email_penulis" name="email_penulis" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp">No hp</label>
                            <input id="no_hp" type="number" name="no_hp" class="form-control" required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Writer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal addCategory -->
    <div class="modal fade" id="modalCategory" tabindex="-1" aria-labelledby="modalCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCategoryLabel">Tambah Kategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="tambahKategori.php">
                        <div class="mb-3">
                            <label for="nama_category" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_category" name="nama_category" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Writer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>