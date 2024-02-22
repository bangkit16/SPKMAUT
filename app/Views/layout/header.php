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
    <title>Admin Dashboard</title>
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
                        <a class="nav-link" href="#">Apa itu Maut?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kenapa Maut?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kelompok</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2 bg-secondary rounded">
                            <a style="font-weight: 500; font-size: large;" class="nav-link text-white" href="#"><i class="bi bi-bar-chart-line"></i> Data Evaluasi</a>
                        </li>
                        <li class="nav-item mb-2 ">
                            <a style="font-weight: 500; font-size: large;" class="nav-link text-black" href="#"><i class="bi bi-archive"></i> Normalisasi</a>
                        </li>
                        <li class="nav-item mb-2 ">
                            <a style="font-weight: 500; font-size: large;" class="nav-link text-black" href="#"><i class="bi bi-clipboard2-x"></i> Perkalian Bobot</a>
                        </li>
                        <li class="nav-item mb-2 ">
                            <a style="font-weight: 500; font-size: large;" class="nav-link text-black" href="#"><i class="bi bi-person-fill-up"></i> Perangkingan</a>
                        </li>

                    </ul>
                </div>
            </nav>