<?php 
	class Usuario{
		private $idUsuario;
		private $nombre;
		private	$app;
		private $apm;
		private $fecha_n;
		private $genero;
		private $tel;
		private $correo;
		private $imagen;
		private $fecha_i;

		public function __construct($array){
			$idUsuario = $array['idUsuarios'];
			$nombre = $array['nombre'];
			$app = $array['apellido_paterno'];
			$apm = $array['apellido_materno'];
			$fecha_n = $array['fecha_nac'];
			$genero = $array['genero'];
			$tel = $array['telefono'];
			$correo = $array['email'];
			$imagen = $array['imagen'];
			$fecha_i = $array['fecha_insertado'];
		}

		public static function getUser($array){
			echo "<div class='usrCard'>".
				"<div class='image'>img</div>".
				"<div class='info'>".$array['nombre']." ". $array['apellido_paterno']." ".$array['apellido_materno']."<br>".$array['email']."</div>".
				"<div class='btn'>btn</div>".
				"</div>";
		}

		public static function getUsers($statement){
			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
				
				switch($row['idRol']){
					case "1":$rol = "A";break;
					case "2":$rol = "D";break;
					case "3":$rol = "U";break;
				}
				echo "<div class='usrCard'>".
					"<div class='image'>".$rol."</div>".
					"<div class='info'>".$row['nombre']." ". $row['apellido_paterno']." ".$row['apellido_materno']."<br>".$row['email']."</div>".
					"<a class='btn' href='administrar_usuario.php?id=".$row['idUsuarios']."'><img src='../img/edit_info_sm.png'></a>".
					"</div>";
			}
		}

		public static function getUserComp($array){
			echo "<div class='usrMenu'>";
				if($array['imagen'])
					echo "<div class='image'><img src='../img/".$array['imagen']."' style='width: 100%;height: 100%;'></div>";
				else
					echo "<div class='image'><img src='../img/default_user_header.png' style='width: 100%;height: 100%;'></div>";
				echo "<div class='nombre' style='cursor:pointer' onclick='redir(\"/perfil.php\")'>".$array['nickname']."</div>".
				"</div>";
		}
		public static function getDefaultUserComp(){
			echo "<div class='usrMenu'>".
				"<div class='image'><img src='../img/default_user_header.png' style='width: 100%;height: 100%;'></div>".	
				"<div class='nombre' style='cursor:pointer;' onclick='redir(\"/login.php\")'>Iniciar Sesion</div>".
				"</div>";
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function getEdad(){
			return $this->edad;
		}

		
        public static function getUsersPedidos($statement){
			while($row = $statement->fetch(PDO::FETCH_ASSOC)){
				echo "<table>".
                    "<td>
                        <div class='desc''>".$row['nombre']."</div>
                    </td>".
                    "<td>
                        <div class='desc'>".$row['fecha_pedido']."</div>
                    </td>".
                    "<td>
                        <div class='desc'>".$row['items']."</div>
                    </td>".
                    "<td>
                        <div class='desc'>".$row['total']."</div>
                    </td>".
                    "<td>
                        <button>X</button>
                    </td>".
					"</table>".
                    "<a href='../ADO/PDF.php'>Generar reporte</a>";
			}
		}
	}

 ?>