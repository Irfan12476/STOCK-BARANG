<?php
session_start();
//membuat databases
$conn = mysqli_connect("localhost","root","","stock1");

//nmabah barang
if(isset($_POST['addnewbarang'])){
	$namabarang = $_POST['namabarang'];
	$deksripsi = $_POST['deksripsi'];
	$stock = $_POST['stock'];
	//gambar
$allowed_extension=array('png','jpg','jpeg');
$nama = $_FILES['file']['name']; //ngambil nama file
$dot = explode('.',$nama);
$ekstensi = strtolower(end($dot));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

//penamaan file
$image = md5(uniqid($nama,true) . time()).'.'.$ekstensi; //gabung file en

$cek = mysqli_query($conn,"select * from stock where namabarang='$namabarang'");

$hitung = mysqli_num_rows($cek);
if($hitung<1){

//jika belum ada
//proses up
if(in_array($ekstensi, $allowed_extension) === true){
//validasi size
if($ukuran < 15000000){
	move_uploaded_file($file_tmp, 'images/'.$image);

	$addtotable = mysqli_query($conn,"insert into stock(namabarang, deksripsi, stock, image) values('$namabarang','$deksripsi','$stock','$image')");
	if($addtotable){
	header('location:index.php');
		}else{
					echo "gagal";
					header('location:index.php');

			}
		}else{
			echo '
				<script>
				alert("ukuran file terlalu besar");
				window.location.href="index.php";
				</script>
				';
			}
		
		
			//kalau filenya lebih
		
		}else{
			//jika gambar nya tidak png

			echo '
			<script>
			alert("file harus png/jpg");
			window.location.href="index.php";
			</script>
			';
		}
		}else{
			echo '
			<script>
			alert("Nama Sudah terdaftar");
			window.location.href="index.php";
			</script>
			';
		}


			
};
//menambah barang masuk
if(isset($_POST['barangmasuk'])){
	$barangnya =$_POST['barangnya'];
	$penerima =$_POST['keterangan'];
	$qty =$_POST['qty'];
	
	$cekstocksekarang =mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
	$ambildatanya = mysqli_fetch_array($cekstocksekarang);

	$stocksekarang = $ambildatanya['stock'];
	$tambahkanstocksekarangquantity = $stocksekarang+$qty;
		$addtomasuk = mysqli_query($conn, "insert into masuk (idbarang, keterangan, qty) values('$barangnya','$penerima','$qty')");
		$updatestockmasuk = mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangquantity'where idbarang='$barangnya'");
		if($addtomasuk&&$updatestockmasuk){
		header('location:masuk.php');
	}else{
		echo "gagal";
		header('location:masuk.php');

	}
 }

 //barang keluar
 if(isset($_POST['addbarangkeluar'])){
	 $barangnya= $_POST['barangnya'];
	 $penerima = $_POST['penerima'];
	 $qty = $_POST['qty'];
	 $cekstocksekarang = mysqli_query($conn,"select *from stock where idbarang='$barangnya'");
	 $ambildatanya= mysqli_fetch_array($cekstocksekarang);

	 $stocksekarang= $ambildatanya['stock'];

	 if($stocksekarang>=$qty){
		// kalau cukup
	 $tambahkanstocksekarangquantity = $stocksekarang-$qty;

		$addtokeluar=mysqli_query($conn, "insert into keluar (idbarang, penerima, qty) values('$barangnya','$penerima','$qty')");
	$updatestockmasuk =mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangquantity' where idbarang='$barangnya'");
	if($addtokeluar&&$updatestockmasuk){
		header('location:keluar.php');
				}else{
					echo "gagal";
					header('location:keluar.php');

				}
			}else{
				//tidak cukup
				echo '
				<script>
				alert("Stock ini tidak mencukupi");
				window.location.href="keluar.php";
				</script>
				';
			}
		
		}
 if(isset($_POST['updatebarang'])){
 	$idb =$_POST['idb'];
 	$namabarang =$_POST['namabarang'];
 	$deksripsi =$_POST['deksripsi'];
	 
	 $allowed_extension=array('png','jpg');
$nama = $_FILES['file']['name']; //ngambil nama file
$dot = explode('.',$nama);
$ekstensi = strtolower(end($dot));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

//penamaan file
$image = md5(uniqid($nama,true) . time()).'.'.$ekstensi; //gabung file en

	if($ukuran==0){
		//jika tidak ingin upload
		$update = mysqli_query($conn, "update stock set namabarang='$namabarang', deksripsi='$deksripsi' where idbarang ='$idb'");

		if($update){
				header('location:index.php');
			   }else{
				   echo "gagal";
				   header('location:index.php');
   
			   }
	}else{
		//jika ingin 
		move_uploaded_file($file_tmp, 'images/'.$image);
		$update = mysqli_query($conn, "update stock set namabarang='$namabarang', deksripsi='$deksripsi', image='$image' where idbarang ='$idb'");

		if($update){
				header('location:index.php');
			   }else{
				   echo "gagal";
				   header('location:index.php');
   
			   }
	}
 }
 // menghapus barang dari stock
 if(isset($_POST['hapusbarang'])){
 	$idb = $_POST['idb']; //idbarang
	 $gambar =mysqli_query($conn,"select * from stock where idbarang='$idb'");
	 $get = mysqli_fetch_array($gambar);
	 $img ='images/'.$get['image'];
	 unlink($img);


 	$hapus = mysqli_query($conn, "delete from stock where idbarang='$idb'");

 	if($hapus){
		 	header('location:index.php');
			}else{
				echo "gagal";
				header('location:index.php');

			}
 }
 //update masuk
 if(isset($_POST['updatebarangmasuk'])){
	 $idb = $_POST['idb'];
	 $idm 	   =$_POST['idm'];
	$deskripsi= $_POST['keterangan'];
	 $qty=       $_POST['qty'];

	 $lihatstock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
	 $stocknya = mysqli_fetch_array($lihatstock);
	 $stockskrg =$stocknya['stock'];

	 $qtyskrg = mysqli_query($conn, "select * from masuk where idmasuk='$idm'");
	 $qtynya = mysqli_fetch_array($qtyskrg);
	 $qtyskrg= $qtynya['qty'];
	 if ($qty>$qtyskrg){
		 $selisih = $qty-$qtyskrg;
		 $kurangin = $stockskrg+$selisih;
		 $kurangistocknya = mysqli_query($conn,"update stock set stock ='$kurangin' where idbarang='$idb'");
	
		 $updatenya = mysqli_query($conn, "update masuk set qty='$qty', keterangan='$deskripsi' where idmasuk='$idm'");

		 if($kurangistocknya&&$updatenya){
		 header('location:masuk.php');
			}else{
				echo "gagal";
				header('location:masuk.php');

			}
 }else{
	$selisih = $qtyskrg-$qty;
	$kurangin= $stockskrg-$selisih;
	$kurangistocknya = mysqli_query($conn,"update stock set stock ='$kurangin' where idbarang='$idb'");
	$updatenya = mysqli_query($conn, "update masuk set qty='$qty', keterangan='$deskripsi' where idmasuk='$idm'");

	if($kurangistocknya&&$updatenya){
	header('location:masuk.php');
	   }else{
		   echo "gagal";
		   header('location:masuk.php');

 }
	 }
	}
	//menghapus
	if(isset($_POST['hapusbarangmasuk'])){
		$idb=$_POST['idb'];
		$qty=$_POST['kty'];
		$idm = $_POST['idm'];
		$getdatastock = mysqli_query($conn, "select *from stock where idbarang='$idb'");
		$data = mysqli_fetch_array($getdatastock);
		$stok = $data['stock'];

		$selisih = $stok -$qty;

		$update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
		$hapusdata = mysqli_query($conn,"delete from masuk where idmasuk='$idm'");

		if($update&&$hapusdata){
			header('location:masuk.php');
	   }else{
		   echo "gagal";
		   header('location:masuk.php');


		}
	}
	//data barang keluarrrrrrrr
	if(isset($_POST['updatebarangkeluar'])){
		$idb = $_POST['idb'];
		$idk	   =$_POST['idk'];
	   $penerima= $_POST['penerima'];
		$qty=       $_POST['qty'];
   
			//mengambil stock

		$lihatstock = mysqli_query($conn, "select * from stock where idbarang='$idb'");
		$stocknya = mysqli_fetch_array($lihatstock);
		$stockskrg =$stocknya['stock'];
   //qty
		$qtyskrg = mysqli_query($conn, "select * from keluar where idkeluar='$idk'");
		$qtynya = mysqli_fetch_array($qtyskrg);
		$qtyskrg= $qtynya['qty'];

		
		if ($qty>$qtyskrg){

			$selisih = $qty-$qtyskrg;
			$kurangin = $stockskrg-$selisih;
if($selisih <= $stockskrg){
	$kurangistocknya = mysqli_query($conn,"update stock set stock ='$kurangin' where idbarang='$idb'");
   
			$updatenya = mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
   
			if($kurangistocknya&&$updatenya){
			header('location:keluar.php');
			   }else{
				   echo "gagal";
				   header('location:keluar.php');
   
			   }
}else{
	echo '
	<script>alert("stock tidak mencukupi");
	window.location.href="keluar.php";
	</script>
	';

}

		
	}else{
	   $selisih = $qtyskrg-$qty;
	   $kurangin= $stockskrg+$selisih;
	   $kurangistocknya = mysqli_query($conn,"update stock set stock ='$kurangin' where idbarang='$idb'");
	   $updatenya = mysqli_query($conn,"update keluar set qty ='$qty', penerima='$penerima' where idkeluar='$idk'");
	   if($kurangistocknya&&$updatenya){
	   header('location:keluar.php');
		  }else{
			  echo "gagal";
			  header('location:keluar.php');
   
	}
		}
	   }
	   //menghapus
	   if(isset($_POST['hapusbarangkeluar'])){
		   $idb=$_POST['idb'];
		   $qty=$_POST['kty'];
		   $idk = $_POST['idk'];
		   $getdatastock = mysqli_query($conn, "select *from stock where idbarang='$idb'");
		   $data = mysqli_fetch_array($getdatastock);
		   $stok = $data['stock'];
   
		   $selisih = $stok +$qty;
   
		   $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
		   $hapusdata = mysqli_query($conn,"delete from keluar where idkeluar='$idk'");
   
		   if($update&&$hapusdata){
			   header('location:keluar.php');
		  }else{
			  echo "gagal";
			  header('location:keluar.php');
   
   
		   }
	   }
	   //ADMIN
	   if(isset($_POST['addadmin'])){
		   $email = $_POST['email'];
		   $password =$_POST['password'];

		   $queryinsert = mysqli_query($conn,"insert into login (email, password) values ('$email','$password')");
		   if($queryinsert){
			header('location:admin.php');

		   }else{
			   //salah
			   header('location:admin.php');
		   }
	   }

	   if(isset($_POST['updateadmin'])){
		$emailbaru = $_POST['emailadmin'];
		$passwordbaru =$_POST['passwordbaru'];
		$id =$_POST['id'];

		$queryupdate = mysqli_query($conn, "update login set email='$emailbaru',  password='$passwordbaru' where iduser='$id'");
		
		if($queryupdate){
		
				header('location:admin.php');
	
			   }else{
				   //salah
				   header('location:admin.php');
			   }
		   }
		   if(isset($_POST['hapusadmin'])){
			$id = $_POST['id'];
			$querydelete = mysqli_query($conn,"delete from login where iduser='$id'");
			if($querydelete){
		
				header('location:admin.php');
	
			   }else{
				   //salah
				   header('location:admin.php');
			   }
		   }

		   //meminjam barang
		   if(isset($_POST['pinjam'])){
			   $idbarangnya = $_POST['barangnya']; // mengambil id barang
			   $qty = $_POST['qty']; //mengambil jumlah Quantity
			   $penerima = $_POST['penerima']; //penerima
			   //ambil stok
			   $stok_saat_ini =mysqli_query($conn, "select * from stock where idbarang='$idbarangnya'");
			   $stok_nya = mysqli_fetch_array($stok_saat_ini);
			   $stok = $stok_nya['stock']; //salah 
//kurangistoknya
$new_stock = $stok-$qty;
			   //mulai qquery

			   $insertpinjam = mysqli_query($conn, "INSERT INTO peminjaman (idbarang,qty,peminjam) values('$idbarangnya','$qty','$penerima')");
//mengurangi stock
$kurangistok =mysqli_query($conn,"update stock set stock ='$new_stock' where idbarang='$idbarangnya'");

			   if($insertpinjam&&$kurangistok){
//berhasil
				 echo '
				   <script>
				   alert("Berhasil");
				   window.location.href="peminjaman.php";
				   </script>
				   ';
			   }else{
				   //jik gagal
				   echo '
				   <script>
				   alert("Gagal");
				   window.location.href="peminjaman.php";
				   </script>
				   ';
				  
			   }
		   }
		   if(isset($_POST['barangkembali'])){
			   $idpinjam = $_POST['idpinjam'];
				$idbarangnya =$_POST['idbarang'];
			   //eksekusi
			   $update_status =mysqli_query($conn,"update peminjaman set status='kembali' where idpeminjaman ='$idpinjam'");
			  
				//kembalikan stovk
				$stok_saat_ini =mysqli_query($conn, "select * from stock where idbarang='$idbarangnya'");
				$stok_nya = mysqli_fetch_array($stok_saat_ini);
				$stok = $stok_nya['stock']; //salah 

				$stok_saat_ini1 =mysqli_query($conn, "select * from peminjaman where idpeminjaman='$idpinjam'");
				$stok_nya1 = mysqli_fetch_array($stok_saat_ini1);
				$stok1 = $stok_nya1['qty']; //salah 
 //kurangistoknya
 $new_stock1 = $stok1+$stok;
 $kembalikan_stock = mysqli_query($conn, "update stock set stock='$new_stock1' where idbarang='$idbarangnya'");

 if($update_status&&$kembalikan_stock){
								 echo '
								   <script>
								   alert("Berhasil");
								   window.location.href="peminjaman.php";
								   </script>
								   ';
							   }else{
								   //jik gagal
								   echo '
								   <script>
								   alert("Gagal");
								   window.location.href="peminjaman.php";
								   </script>
								   ';
								  
							   }
			}
?>
