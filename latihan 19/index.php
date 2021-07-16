<?php 
	/**
	 * 
	 */
	class Pendek
	{
		//property
		private $nama;


		function setNama($nama)
		{
			$this->nama = $nama;
		}
		function getNama()
		{
			return $this->nama;
		}
	}
	$x = new Pendek();
	$x->setNama("Fitri Zuyina");
	echo $x->getNama();

?>