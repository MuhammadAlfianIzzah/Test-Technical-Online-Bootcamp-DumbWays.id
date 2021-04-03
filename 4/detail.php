<?php
include_once "config.php";
include "icon.php";
$connect = $setting; // koneksi database
if (!isset($_GET["id"])) {
    return header("Location: index.php");
}
$id = $_GET["id"];
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
$book_tb = query("SELECT * FROM book_tb WHERE id= $id")[0];
$categoryId = $book_tb["category_id"];
$writerId = $book_tb["writer_id"];
$category_tb =  query("SELECT * FROM category_tb");
$writer_tb = query("SELECT * FROM writer_tb");
$categoryB = query("SELECT * FROM category_tb WHERE id=$categoryId")[0]["name"];
$writerB = query("SELECT * FROM writer_tb WHERE id=$writerId")[0]["name"];
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
    <div class="container mt-5">
        <div class="col-7">

            <div class="card mb-3">
                <div class="row g-0">
                    <?php
                    $img = $book_tb["img"];

                    ?>
                    <div class="col-md-4 border d-flex align-item-center align-items-center flex-nowrap">
                        <img src="img/<?= (file_exists("img/$img")) ? "$img" : "default.jpg" ?> ?>" class="w-100" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ">
                            <h5 class="card-title"><?= $book_tb["name"] ?></h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dicta rerum illum optio a vel maiores totam sunt, aliquam laudantium. Impedit quam non deserunt in fugit. Animi quae deserunt id?</p>
                            <div>
                                Kategori : <a href="category.php" class="text-decoration-none"> <?= $categoryB ?></a>
                            </div>
                            <div>
                                Penulis : <a href="penulis.php" class="text-decoration-none"><?= $writerB ?></a>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal">
                                    <?= iconEdit() ?>
                                </button>
                                <a type="button" class="btn btn-danger" href="deleteBook.php?id=<?= $book_tb["id"] ?>" onclick="return confirm('Anda yakin mau menghapusnya?')">
                                    <?= iconDelete() ?>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Update Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="updateBook.php">
                        <input type="hidden" name="id_book" value="<?= $book_tb["id"] ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama buku</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $book_tb["name"] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategory buku</label>
                            <select class="form-select" name="category" aria-label="Default select example" id="category" required>

                                <?php foreach ($category_tb as $category) : ?>
                                    <option <?php if ($category['id'] == $book_tb["category_id"]) : ?> selected="selected" <?php endif; ?> value="<?= $category["id"] ?>"><?= ucfirst($category["name"]) ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="writer" class="form-label">Penulis buku</label>
                            <select name="writer" class="form-select" aria-label="Default select example" id="writer" required>

                                <?php foreach ($writer_tb as $writer) : ?>
                                    <option <?php if ($writer['id'] == $book_tb["writer_id"]) : ?> selected="selected" <?php endif; ?> value="<?= $writer["id"] ?>"><?= $writer["name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="year">Tahun terbit</label>
                            <input type="number" name="year" class="form-control" min="2000" id="year" pattern="/^-?\d+\.?\d*$/" value="<?= $book_tb["Publication_year"] ?>" onKeyPress="if(this.value.length==4) return false;" required />
                        </div>
                        <div class="mb-3">
                            <label for="img">Gambar Buku</label>
                            <input type="text" value="<?= $book_tb["img"] ?>" class="form-control" name="img" id="img">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning text-white">Update Buku</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>