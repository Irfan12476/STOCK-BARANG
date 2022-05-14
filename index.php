<?php
require 'function.php';

require 'cek.php';

?>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>STOCK</title>
		<link href="css/styles.css" rel="stylesheet" />
		<link href="fontawesome-free-6.1.0-web/css" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
	<style>
		.zoomable{
			width: 100px;

		}
		.zoomable:hover{
			transform: scale(2.5);
			transition: 0.3 ease;
		}
		a{
			text-decoration:none;
			color:white;
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
			<div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
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
							<div class="sb-sidenav-menu-heading"></div>
							<a class="nav-link" href="index.php">
								<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Stock Barang
							</a>
							<a class="nav-link" href="masuk.php">
								<div class="sb-nav-link-icon"><i class="bi bi-bar-chart 5x"></i></div>
								Inputan Masuk
							</a>
							<a class="nav-link" href="keluar.php">
								<div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
								Inputan Keluar
							<a class="nav-link" href="peminjaman.php">
								<div class="sb-nav-link-icon"><i class="bi bi-card-checklist"></i></div>
								Peminjaman Barang
							</a>
							




							
							
							
						</div>
					
					</div>
					
	
				</nav>
			</div>
			<div id="layoutSidenav_content">
				<main>
					<div class="container-fluid">
						<h1 class="mt-4">Stock Barang
						<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
  <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
</svg>
						</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
						
						
						<div class="card mb-4">
							<div class="card-header">
								 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="bi bi-pencil-fill"></i>
   								 tambah data</button> 
									<a href="export.php" class="btn btn-info">Export Data <i class="bi bi-cloud-arrow-down-fill"></i> </a>


						<?php
						$ambildatastock = mysqli_query($conn,"select * from stock where stock < 1");

						while($fetch=mysqli_fetch_array($ambildatastock)){
							$barang = $fetch['namabarang'];

						?>
							</div>
							<div class="card-body">
							<div class="alert alert-danger alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Perhatian!</strong>stock <?=$barang;?> sudah habis
								</div>

								<?php
						}
								?>


								
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>No</th>
												<th>Gambar</th>
												<th>Nama Barang</th>
												<th>Dekskripsi</th>
												<th>Stock</th>
												<th>Aksi</th>
												
											</tr>
										</thead>
										
											</tr>
										</tfoot>
										<tbody>
										<?php
										$ambilsemuadatastock = mysqli_query($conn,"select * from stock");
										$i = 1;
										while($data=mysqli_fetch_array($ambilsemuadatastock)){
										

											$namabarang =$data['namabarang'];
											$deksripsi  =$data['deksripsi'];
											$stock 	    =$data['stock'];
											$idb        =$data['idbarang'];
											//cek ada gambar apa tidak
											$gambar = $data['image'];//ambil gambar
											if($gambar==null){
												//jika tidak ada gambar
												$img='no foto';
											}else{
												//jika ada gambar
												$img='<img src="images/'.$gambar.'" class="zoomable">';
											
											}

										?>
											<tr>
												<td><?=$i++;?></td>
												<td><?=$img;?></td>
												<td><strong><a href="detail.php?id=<?=$idb;?>"><?=$namabarang;?></a></strong></td>
												<td><?=$deksripsi;?></td>
												<td><?=$stock;?>pcs</td>
												<td>
						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>"><i class="bi bi-box-seam"></i>
   								 Edit</button>
   								 
 						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>"><i class="bi bi-trash"></i>
   								Delete</button>


												</td>
												
											</tr>
<!-- The Modal -->
  <div class="modal fade" id="edit<?=$idb;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal EDIT Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
<form method="post" enctype="multipart/form-data">
<div class="modal-body">
<input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
<br>
<input type="text" name="deksripsi" value="<?=$deksripsi;?>" class="form-control" required>
<br>
<input type="file" name="file" class="form-control">
<br>
<input type="hidden" name="idb" value="<?=$idb;?>">


<button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
		</form>
      </div>
    </div>
  </div>
										</div>

  <!-- delete Modal -->
  <div class="modal fade" id="delete<?=$idb;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal delete Header -->
        <div class="modal-header">
          <h4 class="modal-title">Hapus Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
<form method="post">
<div class="modal-body">
Apakah anda yakin ingin menghapus <?=$namabarang;?>?
<input type="hidden" name="idb" value="<?=$idb;?>">
<br>
<br>


<button type="submit" class="btn btn-danger" name="hapusbarang">hapus</button>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
		</form>
      </div>
    </div>
  </div>
										</div>

 					
	

								
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
          <h4 class="modal-title">Tambah stock</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       <form method="post" enctype="multipart/form-data">
<div class="modal-body">
<input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
<br>
<input type="text" name="deksripsi" placeholder="Dekskripsi Barang" class="form-control" required>
<br>
<input type="number" name="stock" value="<?=$stock;?>" placeholder="Stock Awal" value="0"min="0" required>
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
