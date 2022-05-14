<?php
require 'function.php';


?>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>ADMIN</title>
		<link href="css/styles.css" rel="stylesheet" />
		<link href="fontawesome-free-6.1.0-web/css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
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
						<h1 class="mt-4">Kelola Admin</h1>
						<ol class="breadcrumb mb-4">
							
							<strong>	<li class="breadcrumb-item active">silahkan input data akun</li></strong>
		
						</ol>
						
						
						<div class="card mb-4">
							<div class="card-header">
								 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
   								 NEW ADMIN</button> 
									


					

								
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>NO</th>
												<th>EMAIL</th>
												<th>Aksi</th>
									
											</tr>
										</thead>
										
											</tr>
										</tfoot>
										<tbody>
										<?php
										$ambilsemuadataadmin = mysqli_query($conn,"select * from login");
										$i = 1;
										while($data=mysqli_fetch_array($ambilsemuadataadmin)){
										

											$em =$data['email'];
                                            $iduser= $data['iduser'];
                                            $pw =$data['password']

										?>
											<tr>
												<td><?=$i++;?></td>
												<td><?=$em;?></td>
												
												<td>
						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$iduser;?>">
   								 Edit</button>
   								 
 						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$iduser;?>">
   								Delete</button>


												</td>
												
											</tr>
<!-- The Modal -->
  <div class="modal fade" id="edit<?=$iduser;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal EDIT Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
<form method="post">
<div class="modal-body">
<input type="email" name="emailadmin" value="<?=$em;?>"class="form-control" placeholder="masukan email" required>
<br>
<input type="password" name="passwordbaru" class="form-control" value="<?$pw;?>"placeholder ="Masukan password">
<br>
<input type="hidden" name="id" value="<?=$iduser;?>">


<button type="submit" class="btn btn-primary" name="updateadmin">Submit</button>
        
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
  <div class="modal fade" id="delete<?=$iduser;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal delete Header -->
        <div class="modal-header">
          <h4 class="modal-title">Hapus Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
<form method="post">
<div class="modal-body">
Apakah anda yakin ingin menghapus <?=$em;?>?
<input type="hidden" name="id" value="<?=$iduser;?>">
<br>
<br>


<button type="submit" class="btn btn-danger" name="hapusadmin">hapus</button>
        
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
         
          <h4 class="modal-title">Tambah admin</h4>
                                        
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       <form method="post">
<div class="modal-body">
<input type="email" name="email" placeholder="Masukan Email" class="form-control" required>
<br>
<input type="password" name="password" placeholder="Masukan Password" class="form-control" required>
<br>

<button type="submit" class="btn btn-primary" name="addadmin">Submit</button>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
										</form>
      </div>
    </div>
  </div>
</html>
