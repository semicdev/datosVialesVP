<?php
//Inicio la sesión
session_start();
global $_SESSION;
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if ($_SESSION["autentificado"] != "SI") {
//si no existe, envio a la página de autentificacion
echo "<meta http-equiv ='refresh' content='1;URL=index.php'>";
//ademas salgo de este script
exit();
}
?>
