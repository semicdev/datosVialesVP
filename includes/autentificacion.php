<?php
 // include ('mysqlConexion.php');

		$username = $_POST['usuario'];
		$password = $_POST['contrasenya'];

echo"".$username;
echo"".$password;
//host jayrosalgadocom.ipagemysql.com

 $host = "127.0.0.1"; 
 $usuarios = "root"; //infode30_uno
 $contra = ""; //abc123456
 $bd = "infode30_datos_viales";
mysql_connect($host,$usuarios,$contra) or die("no se pudo conectar");
mysql_select_db($bd) or die("no encontro base de datos");
Location("principal.php");
/*
 $consulta = "select * usuarios where nombre = '".$username."'";
  echo"".$consulta;



/*	
		function crearhash($password) {  	// encripatcion de la contrasenya
			$salt = '$2a$%qwerty02d$./1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';  
			$password = hash('sha256', $salt . $password);  
			return $password;  
		}  

		$passwordok= crearhash($password);  
	
		$ssql = "SELECT * FROM usuariossis WHERE login='$username' and pass='$passwordok'";  // verificacion en mysql del usuario y password
		$result =$conexion->query($ssql) ;
		$var= $result->fetch_array();

		if ($var > 0){
			if (($username == $var[login]) and ($passwordok ==$var[pass])){*/
		/*	
			if ($username == "root" and $password =="123")
			{
				session_start();
				global $_SESSION;
				$autentificado = "SI";
			
				$_SESSION['autentificado']=$autentificado;
				$_SESSION['usuario'] = $username;
							
				echo "success";	
			}
*/

/*		}
		mysqli_result::free ($result);
*/

?>
