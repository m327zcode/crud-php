<?php
// login session
session_start();
// jika tidak ada yang login kembali ke login.php
if(!isset($_SESSION['user'])){
  header("Location: login.php");
}
// memnggil file config/memanggil koneksi database
include_once('config.php');
// mengunakan query mysql di php
// parameter 1 koneksi ke database yang di config 2 query mysql
// BISA SELECT * UNTUK MENAMPILKAN SEMUA KOLOM
// BISA SELECT KOLM1, KOLOM2, .. UNTUKK MENAMPILKAN KOLOM YANG DI SEBUTKAN BERDASARKAN URUTAN
// ORDER BY untuk mengurutkan berdasarkan
// id nama kolom
// DESC descending dari bawah
// asc daria atas
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Belajar CRUD</title>
  </head>
  <body>
    <a href="add.php">Add</a><br>
    <a href="logout.php">Logout</a><br>
    <form action="search.php" method="get">
      <input type="text" name="search" placeholder="Search Data">
      <button type="submit" name="submit">Cari</button>
    </form>
    <table border="1" align= "center" width="100%">

      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Umur</th>
          <th>Email</th>
          <th>Password</th>
          <th>Navigasi</th>
        </tr>
      </thead>

      <tbody>
        <?php
        // buat perulangan untuk menampilkan array
        while ($res = mysqli_fetch_array($result)) {
        ?>
          <tr>
            <td><?php echo $res['id'] ?></td>
            <td><?php echo $res['nama'] ?></td>
            <td><?php echo $res['alamat'] ?></td>
            <td><?php echo $res['umur'] ?></td>
            <td><?php echo $res['email'] ?></td>
            <td><?php echo $res['password'] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $res['id'] ?>">Edit</a>
              <a href="delete.php?id=<?php echo $res['id'] ?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>

    </table>
  </form>
  </body>
</html>
