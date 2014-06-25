<?php

$conexion=mysql_connect("127.0.0.1","infode30_uno","abc123456") or die("Problemas en la conexion");
//$conexion = mysql_connect("localhost","root","123") or die("Problemas en la conexion");
mysql_select_db("infode30_datos_viales",$conexion) or die("Problemas en la selección de la base de datos");
mysql_query("SET NAMES 'utf8'");

$username = $_POST['username'];
$password = $_POST['password'];

/*	
function crearhash($password) 
{  	// encripatcion de la contrasenya
	$salt = '$2a$%qwerty02d$./1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';  
	$password = hash('sha256', $salt . $password);  
	return $password;  
}  
*/
	//	$passwordok= crearhash($password);  // cancelada por no encriptacion
	
		$sql = "SELECT * FROM usuarios WHERE nombre = '$username' and clave = '$password'";  // verificacion en mysql del usuario y password
		$registro=mysql_query($sql,$conexion) or die("Error 1:".mysql_error());		
		$var = mysql_fetch_array($registro);
		if ($var > 0)
		{
			if (($username == $var['nombre']) and ($password == $var['clave']))
			{
				session_start();
				global $_SESSION;
				$autentificado = "SI";
				$_SESSION['autentificado']=$autentificado;
				$_SESSION['usuario'] = $username;
				echo "success";	
			}
		}
	
mysql_free_result($registro);

/* cerrar la conexión */
mysql_close($conexion);
?>