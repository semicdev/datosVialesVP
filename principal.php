<?php
session_start();
$tiempo=$_REQUEST['tiempo'];
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<title> Principal </title>
	<link rel="stylesheet" type="text/css" href="bts/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="bts/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
</head>
<body>
    <div class="container">
      <div class="page-header">
          <div class="row">
            <div class="col-md-4 col-lg-4">
                <img src="img/SCT_logo.png" width="185" class="img-responsive" alt="Responsive image">
            </div>
            <div class="col-md-4 col-lg-4">
              <h4 align="center">SISTEMA DATOS VIALES</h4>
            </div>
            <div class="col-md-4 col-lg-4">
                <img src="img/semic_logo.png" align="right" width="185" class="img-responsive" alt="Responsive image">
            </div>
          </div>
        </div>

      <div class="row" style="margin: 2px 10px 10px 0;">
        <div class="col-md-6 col-lg-6" align="left">Año Consulta:<b><?php echo($tiempo);?></b></div>  
        <div class="col-md-6 col-lg-6" id="fecha" align="right"></div>
      </div>   
      <div class="row">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">&nbsp;</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

              <li class="dropdown ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Volúmenes de transito <b class="caret"></b></a>
                <ul class="dropdown-menu">
                     <li><a href="carreteras.php?tiempo=<?php echo($tiempo) ?>&estado=1">Red Nacional de Carreteras Pavimentadas</a></li>
                     <li class="divider"></li>
                     <li><a href="estaciones.php?tiempo=<?php echo($tiempo) ?>&estado=1">Estaciones Permanentes y Conteo de Vehiculos</a></li>
                 </ul>
              </li>
             
              </ul>
                <!---->
              <ul class="nav navbar-nav navbar-right">
                <li><a href="salir.php">Cerrar sesión</a></li>
            </ul>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

      </div>  

      <div class="row">
        <p id="fecha" align="right"></p>
      </div>

      <div class="row">
         <div class="col-md-12 col-lg-12">
          <p align="center"> <img align="center" src="img/sctdv.jpg" ></p>
        </div>

      </div>

      <div class="footer">
        <p align="center" >Los datos que se presentan en este desarrollo se han tomado de la página de SCT</p>
      </div>
    </div> <!-- /container -->

<script type="text/javascript">
  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
  var f=new Date();
    $('#fecha').text(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
</script>
</body>
</html>