<?php 

	/**
	 * 
	 */
	class Usuario
	{

		public function __construct($nombre, $edad)
		{
			$this->nombre = $nombre;
			$this->edad = $edad;
		}

		public function getNombre()
		{
			return $this->nombre;
		}

		public function getEdad()
		{
			return $this->edad;
		}
	}

 ?>