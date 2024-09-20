<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['pelanggan'])) {
    header('Location: login.php');
    exit(); 
}

$user = $_SESSION['pelanggan'];

$nama = isset($_SESSION['pelanggan']) ? $_SESSION['pelanggan'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$hp = isset($_SESSION['hp']) ? $_SESSION['hp'] : '';
$alamat = isset($_SESSION['alamat']) ? $_SESSION['alamat'] : '';
 // id pelanggan

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data input dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];

    // Update informasi pelanggan di database
    $query = "UPDATE tb_user SET nama='$nama', email='$email', hp='$hp', alamat='$alamat'";
    mysqli_query($koneksi, $query);

    // Perbarui session
    $_SESSION['pelanggan'] = $nama;
    $_SESSION['email'] = $email;
    $_SESSION['hp'] = $hp;
    $_SESSION['alamat'] = $alamat;

    header('Location: profil.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .profile-card {
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.457);
            border-radius: 10px;
        }
        .profile-card .card-header {
            background-color: #007bff;
            color: #fff;
            border-bottom: 1px solid #007bff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 .2rem rgba(38, 143, 255, .25);
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

    <div class="container my-5">
        <div class="profile-card mx-auto" style="max-width: 600px;">
            <div class="card-header text-center">
                <h2>Edit Profile</h2>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($_SESSION['pelanggan']); ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="text" name="hp" class="form-control" value="<?php echo htmlspecialchars($_SESSION['hp']); ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                            <input type="text" name="alamat" class="form-control" value="<?php echo htmlspecialchars($_SESSION['alamat']); ?>" required>
                        </div>
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary w-100">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
