<?php 
	
	$koneksi = new PDO('mysql:host=localhost;dbname=berita;','root','');

	// function setData($id, $string, $number, $date)
	// {

	// }
	if(@$_POST['simpan']){
		$id = 1;
		$string = 'saya akan belajar type data';
		$number = '0123456789';
		$date = '2021-07-18';
		$sql = 'INSERT INTO datatype (id, string, number, date) VALUES("'.$id.'","'.$string.'", "'.$number.'", "'.$date.'")';
		$insert = $koneksi->prepare($sql);
		$insert->execute();
		var_dump($insert);
	}


?>
<form method="post">
	<input type="submit" name="simpan" value="Test Data!">
</form>