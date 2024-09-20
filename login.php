  <?php
include 'koneksi.php';
session_start();
if (isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $login = mysqli_query($koneksi, "SELECT * from tb_user where username='$username' and password='$password' ");

 if (mysqli_num_rows($login) > 0){
  while($data = mysqli_fetch_assoc($login)) {

    if ($data['role'] == "admin"){
      $_SESSION['admin'] = $username;
      $_SESSION['id_user'] = $data['id'];
      
      header("Location: admin.php");
    }elseif ($data['role'] == "pelanggan"){
      $_SESSION['id_user'] = $data['id'];
      $_SESSION['user'] = $data['username'];
      $_SESSION['pelanggan'] = $data['nama'];
      $_SESSION['email'] = $data['email'];
      $_SESSION['hp'] = $data['hp'];
      $_SESSION['alamat'] = $data['alamat'];  
      header("Location: profil.php");  
      // echo "<script>alert('anda berhasil login');</script>";
      // echo "<script>Location='checkout.php';</script>";
    }
  };
 }else{
  echo "<script>alert('username dan password salah');</script>";
  echo "<script>Location='login.php';</script>";
 }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" href="log1.css">
        <meta name="viewport" content="width=device-width , initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    
    <body>
      <!-- <video id="bg-video" poster="cyberpunk.jpg" autoplay muted loop>
        <source src="img/cyber.mp4" type="video/mp4" />
      </video> -->
        <div class="filter">
      
        <div class="container">
                <h1 class="Login">Login</h1>
                  <form method="post" enctype="multipart/form-data">
                    <div>
                      <label>Username</label><br>
                      <input type="text" placeholder="Enter Username" name="username" required />
                    </div>
                    <div>
                      <label type="password">Password</label><br>
                      <input type="password" style="-webkit-text-security: square"
                      placeholder="Enter Password" name="password" required />
                    </div>
                    <div class="forget">
                      <!-- <label for=""><input type="checkbox">Remember Me</label>
                    <a href="true.html"></a> -->
                  </div>
                    <div class="button">
                      <button class="btn-hover color-9"type="submit" name="login">Log in</a></button>
                    </div>  
                    <div class="fluid"><br>
                      <p>don't have an account?<a href="register.php"> Register</a></p>
                    </div>
                  </form>
            </div>  
            </div>    
    </body>
</html>