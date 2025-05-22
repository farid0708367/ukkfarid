<?php
session_start();
include('koneksi.php');

if(isset($_GET['no_buku'])){
    $id = $_GET['no_buku'];
    $buku = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM buku WHERE no_buku = '$id'"));

    if(isset($_POST['delete'])){
        mysqli_query($koneksi, "DELETE FROM buku WHERE no_buku = '$id'");
        header('Location: admin.php');
        exit;
    }
} else {
    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Konfirmasi Hapus Buku</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #fcefee;
    margin: 0;
    padding: 40px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .confirmation-box {
    background:rgb(214, 144, 172);
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(204, 151, 204, 0.3);
    max-width: 400px;
    text-align: center;
  }
  h2 {
    color:rgb(150, 89, 150);
    margin-bottom: 20px;
  }
  p {
    color:rgb(133, 83, 83);
    font-size: 18px;
    margin-bottom: 30px;
  }
  button, a {
    font-size: 16px;
    font-weight: bold;
    padding: 12px 25px;
    border-radius: 6px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    margin: 0 10px;
    transition: background-color 0.3s ease;
  }
  button {
    background-color:rgb(127, 28, 28);
    border: none;
    color:rgb(10, 10, 10);
  }
  button:hover {
    background-color:rgb(26, 25, 25);
  }
  a {
    background-color: #fce4ec;
    color:rgb(15, 14, 15);
    border: 1px solidrgb(27, 25, 25);
  }
  a:hover {
    background-color:rgb(186, 113, 113);
    color:rgb(193, 107, 193);
    border-color:rgb(113, 181, 111);
  }
</style>
</head>
<body>
  <div class="confirmation-box">
    <h2>Konfirmasi Penghapusan</h2>
    <p>Apakah Anda yakin ingin menghapus buku <strong><?= htmlspecialchars($buku['judul'] ?? ''); ?></strong>?</p>
    <form method="post" style="display:inline;">
      <button type="submit" name="delete">Hapus</button>
    </form>
    <a href="admin.php">Batal</a>
  </div>
</body>
</html>