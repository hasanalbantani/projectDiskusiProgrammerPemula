<?php 
	//ini digunakan untuk membuat koneksi ke database
	// 1. Nama Variable untuk digunakan sebagai penghubung ke database
	// PDO menggunakan 3 parameter (1) sql yang akan digunakan, ditambahkan nama alamat host 'localhost', ditambahkan juga dengan nama database (2) diisi dengan nama username phpmyadmin (3) diisi dengan password daripada phpmyadmin
	$koneksi = new pdo('mysql:host=localhost;dbname=berita;','root','');

	if(!empty($_POST['simpan'])){

		//apapun yang diinput oleh user dari kolom nama
		$nama = $_POST['nama'];

		//apapun yang diinput oleh user dari kolom email
		$email = $_POST['email'];

		//apapun yang diinput oleh user dari kolom nomor hp
		$hp = $_POST['hp'];

		//ini untuk menyimpan (store) data ke database dari php 
		$query = "insert into pelanggan(nama, email, hp) values(?,?,?)";
		$save = $koneksi->prepare($query);
		$save->bindparam(1, $nama);
		$save->bindparam(2, $email);
		$save->bindparam(3, $hp);
		$save->execute();
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Langanan Berita</title>
	<style>
		*{
			box-sizing: border-box;
		}
		h1{
			padding: 10px 20px;
			text-align: center;
		}
		.group{
			padding: 10px;
		}
		input{
			padding: 10px 20px;
			margin: 5px;
			width: 100%;
		}
		p{
			text-align: center;
		}
		input[type=submit]{
			border-radius: 14px;
			background-color: #285dab;
			color: #fff;
			border: none;
		}
		h1, p{
			text-align:center;
		}
		table{
			width:100%;
			border-collapse:collapse;
		}
		thead tr td{
			font-weight:bold;
			background-color:#5db;
			border:1px solid #fff;
			color:#fff;
			padding:10px;
		}
		tbody tr td:nth-child(2){
		text-align:left;
		}
		tr td{
			text-align:center;
			border:1px solid #ddd;
		}
		tbody tr:hover{
			background-color:rgba(0,0,0,0.01);
		}
		button{
			border:none;
			padding:10px;
			background-color:tomato;
			color:#fff;
			border-radius:6px;
		}
		button:nth-child(2){
			border:none;
			padding:10px;
			background-color:darkred;
			color:#fff;
			border-radius:6px;
		}
		@media screen and (max-width:700px){
			table{
			overflow-x:scroll;
			}
		}
	</style>
</head>
<body>
	<h1>FORM BERLANGGANAN BERITA</h1>
	<p>www.beritaterkini.com</p>
	<form method="post">
		<div class="group">
			<input type="text" name="nama" placeholder="Nama"> <br>
			<input type="email" name="email" placeholder="Email"> <br>
			<input type="text" name="hp" placeholder="Nomor HP" maxlength="13">
			<input type="submit" name="simpan" value="BERLANGGANAN SEKARANG!">
		</div>
	</form>
	<br>
	<?php
		//* digunakan untuk memilih semua kolom yang sudah dibuat didatabase
		$queryTampil = "SELECT * FROM pelanggan";
		$tampil = $koneksi->prepare($queryTampil);
		$tampil->execute();
	?>
		<h1 style="text-align:center">DATA PELANGGAN BERITA</H1>
		<hr>
		<table>
			<thead>
				<tr>
					<td rowspan="2">No</td>
					<td colspan="3">Data</td>
					<td rowspan="2">Aksi</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>Email</td>
					<td>No. HP</td>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
				foreach($tampil as $data){
			?>
				<tr>
					<td><?=$no++;?></td>
					<td><?=$data['nama']?></td>
					<td><?=$data['email']?></td>
					<td><?=$data['hp']?></td>
					<td>
						<button id="editBtn">Edit</button>
						<button id="delBtn">Delete</button>
					</td>
				</tr>
			<?php	}  ?>
			</tbody>
		</table>
</body>
</html>