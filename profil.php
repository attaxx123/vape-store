<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['pelanggan'])) {
    header('Location: login.php');
    exit(); 
}
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        body {
            /* background-image: url('img/liquid2.jpg'); */
            background-color: #fff;
            background-position: auto;
            background-size: cover;
            background-repeat: repeat;
            font-family: Arial, sans-serif;
        }
        .navbar {
            border-bottom: 1px solid #eaeaea;
        }
        .profile-card {
            margin-top: 40px;
            border-radius: 15px;
            overflow: hidden;
            color: white;
            background-color: transparent;
    backdrop-filter: blur(40px);
    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.457);
    border-radius: 10px;
}
        
        .profile-card .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        .profile-card .card-body {
            padding: 30px;
        }
        .profile-card .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 5px solid #343a40;
        }
        .profile-card .form-control-plaintext {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-outline-dark {
            border-color: #343a40;
            color: #343a40;
        }
        .btn-outline-dark:hover {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-light shadow-sm">
    <div class="container px-4 px-lg-9">
        <a class="navbar-brand text-uppercase text-black fw-bold" href="#!">Vape <span class="text-red">Store</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link active text-black fw-semibold" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black fw-semibold" href="keranjang.php">Keranjang</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-black fw-semibold" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#">Liquid</a></li>
                        <li><a class="dropdown-item" href="podmod.php">Pod Mod</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a href="profil.php" class="btn btn-outline-black me-2">
                    <i class="fa-solid fa-user"></i>
                </a>
                <button class="btn btn-outline-black position-relative" type="submit" formaction="keranjang.php">
                    <i class="bi-cart-fill me-1"></i>
                    <span class="badge bg-danger text-white position-absolute top-0 start-100 translate-middle rounded-pill"><?php echo count($_SESSION['cart']); ?></span>
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="profile-card mx-auto" style="max-width: 600px;">
        <div class="card-header">
            <h2>User Profile</h2>
        </div>
        <div class="card-body text-center">
            <img src="img/user2.png" alt="User Avatar" class="avatar">
            <div class="mb-3">
                <label class="form-label text-black"><b>Name:</b></label>
                <input type="text" class="form-control-plaintext text-center" readonly value="<?php echo isset($_SESSION['pelanggan']) ? htmlspecialchars($_SESSION['pelanggan']) : 'Pelanggan tidak tersedia'; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label text-black"><b>Email:</b></label>
                <input type="text" class="form-control-plaintext text-center" readonly value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'Pelanggan tidak tersedia'; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label text-black"><b>Phone Number:</b></label>
                <input type="text" class="form-control-plaintext text-center" readonly value="<?php echo isset($_SESSION['hp']) ? htmlspecialchars($_SESSION['hp']) : 'Pelanggan tidak tersedia'; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label text-black"><b>Address:</b></label>
                <input type="text" class="form-control-plaintext text-center" readonly value="<?php echo isset($_SESSION['alamat']) ? htmlspecialchars($_SESSION['alamat']) : 'Pelanggan tidak tersedia'; ?>">
            </div>
  
            <a href="logout.php" class="btn btn-danger">logout</a>
            <a href="editprofil.php" class="btn btn-primary">edit profil</a>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
