<?php
	$koneksi = new pdo('mysql:host=localhost;dbname=berita;','root','');
	if(!empty($_POST['simpan'])){
		$email = $_POST['email'];
		$hp = $_POST['hp'];
		$query = "INSERT INTO pelanggan (email, hp) VALUES(?,?)";
		$simpan = $koneksi->prepare($query);
		$simpan->bindparam(1, $email);
		$simpan->bindparam(2, $hp);
		$simpan->execute();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Langanan Berita</title>
	<style type="text/css">
		*{
		  	box-sizing:border-box;
		}
		h1{
		  	padding:10px 20px;
		  	text-align:center;
		}
		.group{
		  	padding:10px;
		}
		input{
		  	padding:10px 20px;
		  	margin:10px;
		  	width:100%;
		}
		input[type=submit]{
		  	border-radius:4px;
		  	background-color: #285DAB;
		  	color:#fff;
		  	border:none;
		}
	</style>
</head>
<body>
	<h1>FORM BERLANGGANAN BERITA</h1>
  	<form method="post">
		<div class="group">
	    	<input type="email" name="email" placeholder="email"> <br>
	    	<input type="text" name="hp" placeholder="No. HP" maxlength="13"> <br>
	    	<input type="submit" name="simpan" value="BERLANGGANAN SEKARANG!">
		</div>
  	</form>
</body>
</html>