<?php
include "koneksi.php";
if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];
$login = mysqli_query($koneksi, "select * from user where username='$username' and password='$password' ");
if(mysqli_num_rows($login) >0) {
    header("Location: index.php");
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #6EACDA;
    background-size: 180vh;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

/* h2 {
    text-align: center;
} */

form {
    display: flex;
    flex-direction: column;
}

.input-group {
    margin-bottom: 15px;
}

/* label {
    margin-bottom: 8px;
} */

input[type="text"], input[type="password"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    
}

.input {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    align-items: center;
    justify-content: center;
    display:flex;
    
}

.input:hover {
    background-color: #03346E;
}

</style>
<body>
    <form action="" method="post">
        <table class="login-container">
            <tr class="input-group">
                <td>username</td>
                <td><input type="text" name="username" id=""></td>
            </tr>
            <tr class="input-group">
                <td>password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <!-- <tr>
                <td><input class="input" type="submit" name="login" value="login"></td>
            </tr> -->
        </table>
        <button class="input" type="submit" name="login" value="login">login</button>
    <!-- <input type="text" name="username" id="">
    <input type="password" name="password">
    <input type="submit" name="login" value="login"> -->
    
    </form>
</body>
</html>