<?php
session_start();
include 'koneksi.php';

if(isset($_POST['tambah'])){
    $kode_buku = $_POST['kode_buku'];
    $no_buku = $_POST['no_buku'];
    $judul_buku = $_POST['judul_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $penerbit = $_POST['penerbit'];
    $nama_penulis = $_POST['nama_penulis'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $harga = $_POST['harga'];
    $gambar_buku = $_POST['gambar_buku'];

    $sql = "INSERT INTO buku(kode_buku, no_buku, judul_buku, tahun_terbit, penerbit, nama_penulis, jumlah_halaman, harga, gambar_buku)
            VALUES('$kode_buku','$no_buku','$judul_buku','$tahun_terbit','$penerbit','$nama_penulis','$jumlah_halaman','$harga','$gambar_buku')";
    $mysqli_query = mysqli_query($koneksi, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fcefee; /* soft pink background */
            margin: 0;
            padding: 40px 20px;
        }

        h1 {
            color:rgb(17, 16, 17); /* dark pink */
            text-align: center;
        }

        .form-container {
            background: #fff0f6; /* very soft pink */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(166, 77, 121, 0.3);
            max-width: 500px;
            margin: auto;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color:rgb(15, 14, 14); /* soft pink */
            color:rgb(28, 26, 27); /* dark pink text */
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color:rgb(19, 18, 18); /* slightly darker pink on hover */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color:rgb(202, 188, 188); /* soft pink for header */
            color:rgb(16, 15, 16); /* dark pink text */
        }

        tr:nth-child(even) {
            background-color:rgb(128, 102, 102); /* very light pink for even rows */
        }

        a {
            color:rgb(216, 204, 204); /* dark pink */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Admin Page</h1>
    <div class="form-container">
        <form action="" method="post">
            <input type="number" name="kode_buku" placeholder="Kode Buku" required>
            <input type="number" name="no_buku" placeholder="No Buku" required>
            <input type="text" name="judul_buku" placeholder="Judul Buku" required>
            <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" required>
            <input type="text" name="penerbit" placeholder="Penerbit" required>
            <input type="text" name="nama_penulis" placeholder="Nama Penulis" required>
            <input type="number" name="jumlah_halaman" placeholder="Jumlah Halaman" required>
            <input type="number" name="harga" placeholder="Harga" required>
            <input type="text" name="gambar_buku" placeholder="Gambar Buku" required>
            <input type="submit" name="tambah" value="Tambah">
        </form>
    </div>
    <table>
        <tr>
            <th>NO BUKU</th>
            <th>KODE BUKU</th>
            <th>JUDUL BUKU</th>
            <th>TAHUN TERBIT</th>
            <th>PENERBIT</th>
            <th>NAMA PENULIS</th>
            <th>JUMLAH HALAMAN</th>
            <th>HARGA</th>
            <th>GAMBAR</th>
            <th>AKSI</th>
        </tr>
        <?php
        $mysqli_query = mysqli_query($koneksi, "SELECT * FROM buku");
        while($data = mysqli_fetch_array($mysqli_query)){
            ?>
            <tr>
                <td><?=$data['no_buku'];?></td>
                <td><?=$data['kode_buku'];?></td>
                <td><?=$data['judul_buku'];?></td>
                <td><?=$data['tahun_terbit'];?></td>
                <td><?=$data['penerbit'];?></td>
                <td><?=$data['nama_penulis'];?></td>
                <td><?=$data['jumlah_halaman'];?></td>
                <td><?=$data['harga'];?></td>
                <td><img src="<?=$data['gambar_buku'];?>" alt="cover" width="80px"></td>
                <td>
                    <a href="edit.php?no_buku=<?=$data['no_buku'];?>">EDIT</a>
                    <a href="hapus.php?no_buku=<?=$data['no_buku'];?>">HAPUS</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>