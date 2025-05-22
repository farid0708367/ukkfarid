<?php
session_start();
include('koneksi.php');

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        if ($data['role'] == 'user') {
            header('Location: index.php');
            exit();
        } else if ($data['role'] == 'admin') {
            header('Location: admin.php');
            exit();
        } else {
            header('Location: superadmin.php');
            exit();
        }
    } else {
        echo 'LOGIN GAGAL';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LOGIN</title>
    <style>
       
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #4facfe, #00f2fe);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box {
        background-color: #ffffff;
        padding: 30px 25px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    .box form {
        display: flex;
        flex-direction: column;
    }

    .box input[type="text"],
    .box input[type="password"] {
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .box input[type="text"]:focus,
    .box input[type="password"]:focus {
        border-color: #00c6ff;
        box-shadow: 0 0 5px rgba(0, 198, 255, 0.3);
        outline: none;
    }

    .box input[type="submit"] {
        padding: 12px;
        background-color: #00c6ff;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .box input[type="submit"]:hover {
        background-color: #008ecf;
    }
</style>

    </style>
</head>
<body>
    <div class="box">
        <form action="login.php" method="post" novalidate>
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="login" value="Login" />
        </form>
    </div>
</body>
</html>