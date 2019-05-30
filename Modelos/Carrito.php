<?php 
	class Carrito{
		private $idProducto;
		private $idUsuario;
		private	$talla;
		private $color;

		public function __construct($idP, $idU, $t, $c){
			$idProducto = $idP;
			$idUsuario = $idU;
			$talla = $t;
			$color = $c;
		}

		public function getIdProducto()
		{
			return $idProducto;
		}

		public function getIdUsuario()
		{
			return $idUsuario;
		}

		public function getTalla()
		{
			return $talla;
		}

		public function getColor()
		{
			return $color;
		}


	}

 ?>