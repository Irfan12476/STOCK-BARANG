<?php
require 'function.php';
//dapetin di passing sebelum
$idbarang =$_GET['id']; //
//GET INFORMASI BARANG
$get= mysqli_query($conn, "select * from stock where idbarang='$idbarang'");
$fetch = mysqli_fetch_assoc($get);
//set variabel
$namabarang = $fetch['namabarang'];
$deksripsi = $fetch['deksripsi'];
$stock = $fetch['stock'];

//cek ada gambar apa tidak
$gambar = $fetch['image'];//ambil gambar
if($gambar==null){
    //jika tidak ada gambar
    $img='no foto';
}else{
    //jika ada gambar
   
    $img ='<img class="card-img-top" src="images/'.$gambar.'" alt="Card image" style="width:100%">';
    
}
?>

<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Menampilkan Barang</title>
</head>
<body>
    <div class="container my-4">
    <h3>Detail Barang</h3>
  <div class="card mt-4" style="width:400px">
  <?=$img;?>
<div class="card-body">
      <h4 class="card-title"><?=$namabarang;?></h4>
      <p class="card-text"><?$deksripsi;?></p>
      <p class="card-text"><?$stock;?></p>
      
    </div>
  </div>
  <br>
    </div>
									
</body>
</html>