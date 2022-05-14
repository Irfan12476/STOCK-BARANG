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
    $img='<img src="images/'.$gambar.'" class="zoomable">';

}
//generate qr
$urlview ='https://localhost/persediaan%20barang/view.php?id='.$idbarang;
$qrcode ='https://chart.googleapis.com/chart?chs=350x350&cht=qr&chl='.$urlview.'&choe=UTF-8';

?>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>STOCK DETAIL BARANG</title>
		<link href="css/styles.css" rel="stylesheet" />
		<link href="fontawesome-free-6.1.0-web/css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
	<style>
		.zoomable{
			width: 350px;
            height: 350px;

		}
		.zoomable:hover{
			transform: scale(1.5);
			transition: 0.3 ease;
		}
		</style>
	</head>
	<body class="sb-nav-fixed">
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php">Persediaan Barang</a>
			<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
			<!-- Navbar Search-->
			<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
				<div class="input-group">
					
				</div>
			</form>
			<!-- Navbar-->
			<ul class="navbar-nav ml-auto ml-md-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">					
						<a class="dropdown-item" href="Admin.php">Pengelolaan Admin</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
				</li>
			</ul>
		</nav>
		<div id="layoutSidenav">
			<div id="layoutSidenav_nav">
				<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
					<div class="sb-sidenav-menu">
					<div class="nav">
							<div class="sb-sidenav-menu-heading">Core</div>
							<a class="nav-link" href="index.php">
								<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Stock Barang
							</a>
							<a class="nav-link" href="masuk.php">
								<div class="sb-nav-link-icon"><i class="fas fa-archive 5x"></i></div>
								Inputan Masuk
							</a>
							<a class="nav-link" href="keluar.php">
								<div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
								Inputan Keluar
							<a class="nav-link" href="peminjaman.php">
								<div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
								Peminjaman Barang
							</a>
							




							
							
							
						</div>
					
					</div>
					
					
				</nav>
			</div>
			<div id="layoutSidenav_content">
				<main>
					<div class="container-fluid">
						<h1 class="mt-4">Detail Barang</h1>
						
						
						<div class="card mb-4 mt-4">
                        <div class="card-header">                                
                       <h2> <?=$namabarang;?></h2>
                        <?=$img;?>
                        <img src="<?=$qrcode;?>">
                            </div>
                        <div class="card-body">   
                            <tr>                 
                            <div class="row">
                               <div class="col-md-3">deksripsi</div>
                                <div class="col-md-9">:<?=$deksripsi;?></div>
                            </div>
  
                 <div class="row">
                             <div class="col-md-3">Stock</div> 
                            <div class="col-md-4">:<?=$stock;?> </div>
                          
                               
							
    </div>

    <br><br>

                             <h3> barang masuk</h3>							
								<div class="table-responsive">
									<table class="table table-bordered" id="barang masuk" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>No</th>
											
												<th>Tanggal</th>
												<th>keterangan</th>
												<th>Quantity</th>
												
											</tr>
										</thead>
										
											</tr>
										</tfoot>
										<tbody>
										<?php
										$ambildatamasuk = mysqli_query($conn,"select * from masuk where idbarang='$idbarang'");
                                        $i = 1;
                                        while($fetch=mysqli_fetch_array($ambildatamasuk)){
                                            $tanggal = $fetch['tanggal'];
                                            $keterangan = $fetch['keterangan'];
                                            $quantity = $fetch['qty'];

										?>
											<tr>
												<td><?=$i++;?></td>
												<td><?=$tanggal;?></td>
												<td><?=$keterangan;?></td>
												<td><?=$quantity;?></td>
						
												
											</tr>

  

								
											<?php
											};

											?>
										</tbody>
									</table>
								</div>


<br><br>
                                <h3> barang keluar</h3>							
								<div class="table-responsive">
									<table class="table table-bordered" id="barangkeluar" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>No</th>
											
												<th>Tanggal</th>
												<th>Penerima</th>
												<th>Quantity</th>
												
											</tr>
										</thead>
										
											</tr>
										</tfoot>
										<tbody>
										<?php
										$ambildatakeluar = mysqli_query($conn,"select * from keluar where idbarang='$idbarang'");
                                        $i = 1;
                                        while($fetch=mysqli_fetch_array($ambildatakeluar)){
                                            $tanggal = $fetch['tanggal'];
                                            $penerima = $fetch['penerima'];
                                            $quantity = $fetch['qty'];

										?>
											<tr>
												<td><?=$i++;?></td>
												<td><?=$tanggal;?></td>
												<td><?=$penerima;?></td>
												<td><?=$quantity;?></td>
						
												
											</tr>

  

								
											<?php
											};

											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</main>
				<footer class="py-4 bg-light mt-auto">
					
				</footer>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/chart-area-demo.js"></script>
		<script src="assets/demo/chart-bar-demo.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/datatables-demo.js"></script>
	</body>
	<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       <form method="post" enctype="multipart/form-data">
<div class="modal-body">
<input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
<br>
<input type="text" name="deksripsi" placeholder="Dekskripsi Barang" class="form-control" required>
<br>
<input type="number" name="stock" class="form-control" >
<br>
<input type="file" name="file" class="form-control" >
<br>
<button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
										</form>
      </div>
    </div>
  </div>
</html>
                                        