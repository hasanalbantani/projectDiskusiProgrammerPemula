<?php 
	//ini digunakan untuk membuat koneksi ke database
	// 1. Nama Variable untuk digunakan sebagai penghubung ke database
	// PDO menggunakan 3 parameter (1) sql yang akan digunakan, ditambahkan nama alamat host 'localhost', ditambahkan juga dengan nama database (2) diisi dengan nama username phpmyadmin (3) diisi dengan password daripada phpmyadmin

	function saveData(){
		$koneksi = new pdo('mysql:host=localhost;dbname=berita;','root','');
		if(!empty($_POST['simpan'])){

		// 	//apapun yang diinput oleh user dari kolom nama
			$nama = $_POST['nama'];

		// 	//apapun yang diinput oleh user dari kolom email
			$email = $_POST['email'];

		// 	//apapun yang diinput oleh user dari kolom nomor hp
			$hp = $_POST['hp'];

		// 	//ini untuk menyimpan (store) data ke database dari php 
			$query = "insert into pelanggan(nama, email, hp) values(?,?,?)";
			$save = $koneksi->prepare($query);
			$save->bindparam(1, $nama);
			$save->bindparam(2, $email);
			$save->bindparam(3, $hp);
			$save->execute();
			// var_dump($save);
		}
	}

	function saveDataBaru(){
		$koneksi = new pdo('mysql:host=localhost;dbname=berita;','root','');
		if(!empty($_POST['simpan'])){

		// 	//apapun yang diinput oleh user dari kolom id_pelanggan
			// $id_pelanggan = $_POST['pelanggan'];

		// 	//apapun yang diinput oleh user dari kolom kategori
			// $kategori = $_POST['kategori'];

		// 	//ini untuk menyimpan (store) data ke database dari php 
			$query = "insert into data(id_pelanggan, kategoriberita) values(?,?)";
			$save = $koneksi->prepare($query);
			$save->bindparam(1, $id_pelanggan);
			$save->bindparam(2, $kategori);
			$save->execute();
			// if($save){
			// 	echo "<script>alert('Data berhasil disimpan')</script>";
			// }else{
			// 	echo "<script>alert('Data gagal disimpan')</script>";
			// 	return false;
			// }
			// var_dump($save);
		}
	}

	function getKategori(){
		// digunakan untuk memilih semua kolom yang sudah dibuat didatabase
		$koneksi = new pdo('mysql:host=localhost;dbname=berita;','root','');
		$queryTampil = "SELECT * FROM kategori";
		$tampil = $koneksi->prepare($queryTampil);
		$tampil->execute();
		$check = $tampil->rowCount();
		if($check > 0){
			foreach($tampil as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
	}

	function getRelationData(){
		// digunakan untuk memilih semua kolom yang sudah dibuat didatabase
		$koneksi = new pdo('mysql:host=localhost;dbname=berita;','root','');
		$queryTampil = "SELECT * FROM data";
		$tampil = $koneksi->prepare($queryTampil);
		$tampil->execute();
		$check = $tampil->rowCount();
		if($check > 0){
			foreach($tampil as $data){
				$hasil[] = $data;
			}
			return $hasil;
		}
	}