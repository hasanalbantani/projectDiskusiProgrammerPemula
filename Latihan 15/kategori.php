<?php 
	include "./function.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kategori</title>
	<style type="text/css">
		*{
			box-sizing: border-box;
		}
		form{
			width: 50%;
			margin: 30px auto;
			box-shadow: 3px 3px 3px rgba(0,0,0,0.3);
		}
		.form-group{
			padding:12px 20px;
			width: 100%;
		}
		h1{
			text-align: center;
		}
		.form-control{
			width: 100%;
			height: 30px;
		}
	</style>
</head>
<body>
	<div>
		<form method="post" action="<?=saveDataBaru()?>">
			<h1>
				Pilihan Berita Pelanggan
			</h1>
			<div class="form-group">
				<select name="pelanggan" class="form-control">
					<option>-Pilih Pelanggan-</option>
				</select>
			</div>
			<div class="form-group">
				<select name="kategori" class="form-control">
					<option>-Pilih Kategori-</option>
					<?php
						$x = getKategori();
						if(is_array($x)||is_object($x)){
							foreach($x as $y){
					?>
					<option value="<?=$y['id_kategori']?>"><?=$y['kategori']?></option>
					<?php } } ?>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="simpan" value="Simpan">
			</div>
		</form>
	</div>
	<hr>
	<h1 style="text-align:center">DATA SUBSCRIBER</H1>
		<hr>
		<table>
			<thead>
				<tr>
					<td>No</td>
					<td>Nama Pelanggan</td>
					<td>Kategori Berita</td>
				</tr>
			</thead>
			<tbody>
			<?php
				$x = getRelationData();
				if(is_array($x)||is_object($x)){
					foreach($x as $y){
			?>
			
				<tr>
					<td><?=$y['id_data']?></td>
					<td><?=$y['id_pelanggan']?></td>
					<td><?=$y['kategoriberita']?></td>
					
				</tr>
			<?php		}
				}
			?>
			</tbody>
		</table>
</body>
</html>