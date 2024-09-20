<?php
session_start();

if(!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="img/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="<link rel=stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDropdown">
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
   
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="podmod.php"><img src="img/2.gif" class="d-block w-70 h-ful" width="100%" height="790"  alt="..."></a>
    </div>
    <div class="carousel-item">
      <img src="img/3.gif" class="d-block w-70" width="100%" height="790"  alt="...">
    </div>
    <!-- <div class="carousel-item">
      <img src="https://images.tokopedia.net/img/cache/1200/BgtCLw/2021/10/20/1ceef575-f0b7-4a5c-9f11-5534269fb58c.jpg.webp?ect=4g" class="d-block w-70" width="100%" height="790" alt="...">
    </div> -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
     
        <main>

<section class="py-5 text-center container">
  <!-- <div class="row py-lg-5"> -->
    <!-- <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light"></h1>
    </div> -->
  <!-- </div> -->
</section>

<div class="album py-5 bg-body-tertiary">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
      <div class="col">
      <div class="card" style="width: 18rem;">
      <a href="podmod.php">
       <img src="img/MOD-2.webp" class="card-img-top" alt="...">
      </a>
    </div>
      </div>
      <div class="col">
      <div class="card" style="width: 18rem;">
      <a href="liquid.php">
       <img src="img/LIQUID-2.webp" class="card-img-top" alt="...">
      </a>
</div>
      </div>
      <div class="col">
      <div class="card" style="width: 18rem;">
      <a href="podmod.php">
       <img src="img/POD-2.webp" class="card-img-top" alt="...">
      </a>
</div>
      </div>
    </div>
  </div>
</div>

</main>


        <main>

<section class="py-5 text-center container">
  <!-- <div class="row py-lg-5"> -->
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">NEW PRODUK</h1>
    </div>
  <!-- </div> -->
</section>

<div class="album py-5 bg-body-tertiary">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
    <div class="col">
    <div class="card" style="width: 18rem;">
  <img src="img/mod3.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">SOJU MANGGO</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">lihat produk</a>
  </div>
</div>
      </div>
      <div class="col">
      <div class="card" style="width: 18rem;">
  <img src="img/9.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">LIQUID SOJU GRAPE</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">lihat produk</a>
  </div>
</div>
      </div>
      <div class="col">
      <div class="card" style="width: 18rem;">
  <img src="img/pod6.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">POD PELANGI</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Lihat produk</a>
  </div>
    </div>
      <div class="col">
      <!-- <div class="card" style="width: 18rem;">
      <a href="podmod.php">
       <img src="img/POD-2.webp" class="card-img-top" alt="...">
      </a>
</div> -->
    </div>
      <div class="col">
      <!-- <div class="card" style="width: 18rem;">
      <a href="podmod.php">
       <img src="img/POD-2.webp" class="card-img-top" alt="...">
      </a>
</div> -->
    </div>
      <div class="col">
      <!-- <div class="card" style="width: 18rem;">
      <a href="podmod.php">
       <img src="img/POD-2.webp" class="card-img-top" alt="...">
      </a>
</div> -->
    </div>
  </div>
</div>

</main>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">VAPE STORE &copy;VapeStore.com</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
