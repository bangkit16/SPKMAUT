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
    <title>Dashboard Metode MAUT</title>
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

                <h1 class="h1 mb-3">Data Evaluasi</h1>
                <a type="button" href="tambahAlternatif" class="btn btn-primary">Tambah Alternatif</a>
                <a type="button" href="tambahKriteria" class="btn btn-secondary">Tambah Kriteria</a>
                <table class="table mt-4 ">
                    <thead>
                        <tr>
                            <th scope="col" class="border" rowspan="4" style="vertical-align: middle;">No</th>
                            <th scope="col" class="border" rowspan="4" style="vertical-align: middle;">Alternatif</th>
                            <th scope="col" class="border" colspan="<?= count($krit); ?>" style="text-align: center;">Kriteria</th>
                            <th scope="col" class="border" rowspan="4" style="vertical-align: middle;">Aksi</th>
                        </tr>
                        <tr>
                            <?php foreach ($krit as $kritt) :  ?>
                                <th scope="col" class="border flex">
                                    <?= $kritt['krit']; ?>
                                    <a href="editKrit/<?= $kritt['id_kriteria']; ?>" class="mr-0 text-primary-emphasis"><i class="bi bi-pencil-square"></i></a>
                                    <a href="hapusKrit/<?= $kritt['id_kriteria']; ?>" class="mr-0 text-primary-emphasis ms-auto"><i class="bi bi-trash"></i></a>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <?php foreach ($krit as $krittt) :  ?>
                                <th  class="border flex">

                                    <?= $krittt['bobot']; ?>
                                </th>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <?php foreach ($krit as $jenis) :  ?>
                                <th  class="border flex">

                                    <?= $jenis['jenis']; ?>
                                </th>
                            <?php endforeach; ?>
                        </tr>




                    </thead>

                    <tbody>
                        <?php $a = 1;
                        // dd($eval);
                        // dd($evall);
                        // dd($alt);
                        foreach ($val as $v) :  ?>
                            <tr class="border">
                                <th><?= $a++; ?></th>
                                <td class="border"><?= $v['alt']; ?></td>
                                <?php foreach ($v['krit'] as $ev) :  ?>
                                    <td class="border"><?= $ev[0]['nilai']; ?></td>
                                <?php endforeach; ?>
                                <td>
                                    <a href="editAlt/<?= $v['id_alternatif']; ?>" class="btn btn-light"><i class="bi bi-pencil-square"></i></a>
                                    <a href="hapusAlt/<?= $v['id_alternatif']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>