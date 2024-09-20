<?php
include 'koneksi.php';

if(isset($_POST['masuk'])){
    $username = $_POST['username'];    
    $password = $_POST['password'];
    
    $masuk = mysqli_query(
    $koneksi,"INSERT INTO user(username,password)
     VALUES('$username','$password')" );
     if($masuk > 0){
        header("Location: loginadmin.php");
     }else{
        header("Location: adminreg.php");
     }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="username">username</label>
            <input type="text" id="password" name="username" required>

            <label for="passwordd">password:</label>
            <input type="text" id="confirm-password" name="password" required>

            <button class="regis" type="submit" name="masuk">Register</button>
        </form>
        <div class="table-responsive small">
      </div>

        
    </div>
</body>
</html>
