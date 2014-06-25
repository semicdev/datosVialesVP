<?php 
  $tiempo=$_REQUEST['tiempo'];
  $estado=$_REQUEST['estado'];
  $estacion=$_REQUEST['estacion'];
  $conexion=mysql_connect("127.0.0.1","infode30_uno","abc123456") or die("Problemas en la conexion");
 // $conexion=mysql_connect("localhost","root","") or die("Problemas en la conexion");
  mysql_select_db("infode30_datos_viales",$conexion) or die("Problemas en la selección de la base de datos");
  mysql_query("SET NAMES 'UFT-8'");
/////////////////////
  $sql="select ";
  $sql.="id_estacion, ";
  $sql.="cve_capufe, ";
  $sql.="nombre, ";
  $sql.="movimiento, ";
  $sql.="nombre_carr_capufe, ";
  $sql.="km, ";
  $sql.="sentido, ";
  $sql.="numero_ruta, ";
  $sql.="tdpa, ";
  $sql.="a, ";
  $sql.="ar, ";
  $sql.="b, ";
  $sql.="c2, ";
  $sql.="c3, ";
  $sql.="c4, ";
  $sql.="c5, ";
  $sql.="c6, ";
  $sql.="c7, ";
  $sql.="c8, ";
  $sql.="c9, ";
  $sql.="vnc, ";
  $sql.="vta, ";
  $sql.="ene, ";
  $sql.="feb, ";
  $sql.="mar, ";
  $sql.="abr, ";
  $sql.="may, ";
  $sql.="jun, ";
  $sql.="jul, ";
  $sql.="ago, ";
  $sql.="sep, ";
  $sql.="oct, ";
  $sql.="nov, ";
  $sql.="dic ";
  $sql.="from ";
  $sql.="estaciones_permanentes ";
  $sql.="where ";
  $sql.="id_tiempo=$tiempo and ";
  $sql.="id_estacion=$estacion ";
  $sql.="order by ";
  $sql.="id_estacion ";
  $registro=mysql_query($sql,$conexion) or die("Error:".mysql_error());

  while($reg=mysql_fetch_array($registro))
  {
    $id_estacion=$reg['id_estacion'];
    $cve_capufe=$reg['cve_capufe'];
    $nombre=$reg['nombre'];
    $movimiento=$reg['movimiento'];
    $nombre_carr_capufe=$reg['nombre_carr_capufe'];
    $km=$reg['km'];
    $sentido=$reg['sentido'];
    $numero_ruta=$reg['numero_ruta'];
    $tdpa=$reg['tdpa'];
    $a=$reg['a'];
    $ar=$reg['ar'];
    $b=$reg['b'];
    $c2=$reg['c2'];
    $c3=$reg['c3'];
    $c4=$reg['c4'];
    $c5=$reg['c5'];
    $c6=$reg['c6'];
    $c7=$reg['c7'];
    $c8=$reg['c8'];
    $c9=$reg['c9'];
    $vnc=$reg['vnc'];
    $vta=$reg['vta'];
    $ene=$reg['ene'];
    $feb=$reg['feb'];
    $mar=$reg['mar'];
    $abr=$reg['abr'];
    $may=$reg['may'];
    $jun=$reg['jun'];
    $jul=$reg['jul'];
    $ago=$reg['ago'];
    $sep=$reg['sep'];
    $oct=$reg['oct'];
    $nov=$reg['nov'];
    $dic=$reg['dic'];

  function FechaFormateada($FechaStamp){
    $ano = date('Y',$FechaStamp); //<-- Año
    $mes = date('m',$FechaStamp); //<-- número de mes (01-31)
    $dia = date('d',$FechaStamp); //<-- Día del mes (1-31)
    $dialetra = date('w',$FechaStamp);  //Día de la semana(0-7)
    switch($dialetra){
    case 0: $dialetra="Domingo"; break;
    case 1: $dialetra="Lunes"; break;
    case 2: $dialetra="Martes"; break;
    case 3: $dialetra="Miércoles"; break;
    case 4: $dialetra="Jueves"; break;
    case 5: $dialetra="Viernes"; break;
    case 6: $dialetra="Sábado"; break;
    }

    switch($mes) {
    case '01': $mesletra="Enero"; break;
    case '02': $mesletra="Febrero"; break;
    case '03': $mesletra="Marzo"; break;
    case '04': $mesletra="Abril"; break;
    case '05': $mesletra="Mayo"; break;
    case '06': $mesletra="Junio"; break;
    case '07': $mesletra="Julio"; break;
    case '08': $mesletra="Agosto"; break;
    case '09': $mesletra="Septiembre"; break;
    case '10': $mesletra="Octubre"; break;
    case '11': $mesletra="Noviembre"; break;
    case '12': $mesletra="Diciembre"; break;
    }  
    return "$dialetra, $dia de $mesletra de $ano";
  }
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<title> Estaciones </title>
	<link rel="stylesheet" type="text/css" href="bts/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="bts/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="funciones.js"></script>
 
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>
    <div class="container">
      <div class="page-header">
          <div class="row">
            <div class="col-md-4 col-lg-4">
                <img src="img/SCT_logo.png" width="185" class="img-responsive" alt="Responsive image">
            </div>
            <div class="col-md-4 col-lg-4">
              <h4 align="center">Estaciones permanentes conteo de vehículos</h4>
            </div>
            <div class="col-md-4 col-lg-4">
                <img src="img/semic_logo.png" align="right" width="185" class="img-responsive" alt="Responsive image">
            </div>
          </div>
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
                  <li><a href="#">Red Nacional de Carreteras Pavimentadas</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Estaciones Permanentes y Conteo de Vehiculos</a></li>
                </ul>
              </li>
              <!---->
               <li class="dropdown ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">TDPA <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="estaciones.php?tiempo=2008&estado=<?php echo($estado); ?>">TDPA 2008</a></li>
                  <li><a href="estaciones.php?tiempo=2009&estado=<?php echo($estado); ?>">TDPA 2009</a></li>
                  <li><a href="estaciones.php?tiempo=2010&estado=<?php echo($estado); ?>">TDPA 2010</a></li>
                  <li><a href="estaciones.php?tiempo=2011&estado=<?php echo($estado); ?>">TDPA 2011</a></li>
                  <li><a href="estaciones.php?tiempo=2012&estado=<?php echo($estado); ?>">TDPA 2012</a></li>
                  <li><a href="estaciones.php?tiempo=2013&estado=<?php echo($estado); ?>">TDPA 2013</a></li>
                  <li><a href="estaciones.php?tiempo=2014&estado=<?php echo($estado); ?>">TDPA 2014</a></li>
                </ul>
              </li>
              </ul>
                <!---->
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Cerrar sesión</a></li>
            </ul>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
      <div class="row">
        <p class="col-md-6 col-lg-6" align="left">
        Año Consulta  <?php echo($tiempo);?></p>
        <p class="col-md-6 col-lg-6" id="fecha" align="right"></p>
      </div>

      </div>  
        <div class="row" class="col-md-12 col-lg-12">
          <div class="col-md-5 col-lg-5">
            <table class="table table-bordered" id="datos_carretera">
              <tr> 
                <td>Clave</td> 
                <td><?php echo($cve_capufe) ?></td>
              </tr>
              <tr> 
                <td>Cuenta</td> 
                <td><?php echo($nombre) ?></td>
              </tr>
              <tr> 
                <td>Movimiento</td> 
                <td><?php echo($movimiento) ?></td>
              </tr>
              <tr> 
                <td>Caseta</td> 
                <td><?php echo($nombre_carr_capufe) ?></td>
              </tr>
              <tr> 
                <td>KM</td> 
                <td><?php echo($km)?></td>
              </tr>
              <tr> 
                <td>Sentido</td> 
                <td><?php echo($sentido) ?></td>
              </tr>
              <tr> 
                <td>Año</td> 
                <td><?php echo($tiempo) ?></td>
              </tr>
            </table> 
          </div>
          <div class="col-md-7 col-lg-7">
            <p  align="right"> 
            <!--<img src="img/x_rep_01.jpg">-->
             <?php
             echo "<a href='http://info-de-proyectos.com/img".$tiempo."/rep_01.jpg' target='_blank'> <img src='http://info-de-proyectos.com/img".$tiempo."/x_rep_01.jpg' width='321'/></a>"; ?>
            </p>
          </div>
      </div>

      <div class="row" class="col-md-12 col-lg-12">
        <h4 align="center">CLASIFICACÓN VEHÍCULAR EN POR CIENTO</h4>
      </div>
      <div class="row" class="col-md-12 col-lg-12">
        <table class="table table-bordered" >
          <tr> 
            <td>TDPA</td> 
            <td>A</td> 
            <td>AR</td> 
            <td>B</td> 
            <td>C2</td> 
            <td>C3</td>  
            <td>C4</td> 
            <td>C5</td> 
            <td>C6</td> 
            <td>C7</td>
            <td>C8</td>
            <td>C9</td> 
            <td>VNC</td> 
          </tr>
          <!--CONSULTA DE DATOS-->
              <tr> 
                <td>
                  <?php 
                  $s_temp=number_format($tdpa,2,'.',',');
                  echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php 
                  $s_temp=number_format($a,2,'.',',');
                  echo $s_temp; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($ar,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php 
                  $s_temp=number_format($b,2,'.',','); echo $s_temp ; 

                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($c2,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($c3,2,'.',','); echo $s_temp ; 
                  ?>
                </td>  
                <td>
                  <?php
                  $s_temp=number_format($c4,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($c5,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($c6,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($c7,2,'.',','); echo $s_temp ; 
                  ?>
                </td>
                <td>
                  <?php
                  $s_temp=number_format($c8,2,'.',','); echo $s_temp ; 
                  ?>
                </td>
                <td>
                  <?php
                  $s_temp=number_format($c9,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($vnc,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
              </tr>
        </table> 
      </div>  


       <div class="row" class="col-md-12 col-lg-12">
        <h4 align="center">VOLUMENES DE TRANSITO EN POR CIENTO MENSUAL</h4>
      </div>
      <div class="row" class="col-md-12 col-lg-12">
        <table class="table table-bordered" >
          <tr> 
            <td>ENE</td> 
            <td>FEB</td> 
            <td>MAR</td> 
            <td>ABR</td> 
            <td>MAY</td> 
            <td>JUN</td>  
            <td>JUL</td> 
            <td>AGO</td> 
            <td>SEP</td> 
            <td>OCT</td>
            <td>NOV</td>
            <td>DIC</td> 
            <td>VTA</td> 
          </tr>
          <!--CONSULTA DE DATOS-->
              <tr> 
                <td>
                  <?php 
                  $s_temp=number_format($ene,2,'.',',');
                  echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php 
                  $s_temp=number_format($feb,2,'.',',');
                  echo $s_temp; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($mar,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php 
                  $s_temp=number_format($abr,2,'.',','); echo $s_temp ; 

                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($may,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($jun,2,'.',','); echo $s_temp ; 
                  ?>
                </td>  
                <td>
                  <?php
                  $s_temp=number_format($jul,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($ago,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($sep,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($oct,2,'.',','); echo $s_temp ; 
                  ?>
                </td>
                <td>
                  <?php
                  $s_temp=number_format($nov,2,'.',','); echo $s_temp ; 
                  ?>
                </td>
                <td>
                  <?php
                  $s_temp=number_format($dic,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
                <td>
                  <?php
                  $s_temp=number_format($vta,2,'.',','); echo $s_temp ; 
                  ?>
                </td> 
              </tr>
          <?php } //fin del while?>
          
        </table> 
      </div>  
      <div class="footer">
        <p align="center" >Datos Viales Sistema Experimental desarrollado por SEMIC</p>
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