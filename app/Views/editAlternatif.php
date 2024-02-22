<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>Edit Alternatif</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        #sidebar {
            height: 93vh;
            background-color: #f8f9fa;

        }

        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #007bff;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Metode Maut</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto gx-5">
                    <li class="nav-item">
                        <a class="nav-link" href="apaitu">Apa itu Maut?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kenapa">Kenapa Maut?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kelompok">Kelompok</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar pt-3">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2 bg-secondary rounded">
                            <a style="font-weight: 500; font-size: large;" class="nav-link text-white" href="/"><i class="bi bi-bar-chart-line"></i> Data Evaluasi</a>
                        </li>
                        <li class="nav-item mb-2 ">
                            <a style="font-weight: 500; font-size: large;" class="nav-link text-black" href="normalisasi"><i class="bi bi-archive"></i> Normalisasi</a>
                        </li>
                        <li class="nav-item mb-2 ">
                            <a style="font-weight: 500; font-size: large;" class="nav-link text-black" href="perkalian"><i class="bi bi-clipboard2-x"></i> Perkalian Bobot</a>
                        </li>
                        <li class="nav-item mb-2 ">
                            <a style="font-weight: 500; font-size: large;" class="nav-link text-black" href="perangkingan"><i class="bi bi-person-fill-up"></i> Perangkingan</a>
                        </li>

                    </ul>
                </div>
            </nav>

            <!-- Konten utama -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-5">
                <div class="col-md-9 ">
                    <h1 class="h1 mb-5">Edit Alternatif</h1>
                    <form method="post" action="updateAlt">
                        <div class="mb-3">
                            <label for="alter" class="form-label">Nama Alternatif</label>
                            <input type="text" class="form-control" value="<?= $alt; ?>" name="alt" id="alter" aria-describedby="emailHelp">
                            <input type="hidden" value="<?= $id; ?>" name="id">
                        </div>
                        <h5 class="h5">Masukan Nilai Kriteria</h5>
                        <?php foreach ($nilai as $k) : ?>
                            <div class="mb-3">
                                <label for="krite" class="form-label"><?= $k['krit']; ?></label>
                                <input type="number" class="form-control" value="<?= $k['nilai']; ?>" name="nilai[]" id="krite" aria-describedby="emailHelp">
                                <input type="hidden" value="<?= $k['id_krit']; ?>" name="id_krit[]">
                            </div>
                        <?php endforeach; ?>
                        <!-- <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </main>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>