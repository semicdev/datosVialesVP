<?php 
  $tiempo=$_REQUEST['tiempo'];
  $estado=$_REQUEST['estado'];
  $bus_caseta=$_POST['bus_caseta'];
  $bus_estacion=$_POST['bus_estacion'];
  $bus_carretera=$_POST ['bus_carretera'];
  //$conexion=mysql_connect("localhost","root","") or die("Problemas en la conexion");
  $conexion=mysql_connect("127.0.0.1","infode30_uno","abc123456") or die("Problemas en la conexion");
    mysql_select_db("infode30_datos_viales",$conexion) or die("Problemas en la selección de la base de datos");
    mysql_query("SET NAMES 'UTF-8'");
    $sql="select ";
    $sql.="id_estacion, ";
    $sql.="cve_capufe, ";
    $sql.="nombre, ";
    $sql.="movimiento, ";
    $sql.="nombre_carr_capufe, ";
    $sql.="km ";
    $sql.="from ";
    $sql.="estaciones_permanentes ";
    $sql.="where ";
    $sql.="id_tiempo=$tiempo ";

    if( $bus_caseta!="" || $bus_estacion!="" || $bus_carretera!="")
    {
      $sql.=" and ";
      if($bus_caseta!="")
        $sql.=" cve_capufe like '$bus_caseta%' ";
      if($bus_estacion!="")
      {
        if($bus_caseta!="")
         $sql.=" and ";
        $sql.=" nombre like '$bus_estacion' ";
      }
      if($bus_carretera!="")
      {
        if($bus_caseta!="" || $bus_estacion!="")
          $sql.=" and ";
        $sql.=" nombre_carr_capufe like '$bus_carretera' ";
      }
    } 
    $sql.="order by ";
    $sql.="id_estacion ";
 $registro=mysql_query($sql,$conexion) or die("Error:".mysql_error());

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

  
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
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
        <div class="row" class="col-md-12 col-lg-12" align="left">
          <div class="col-md-5 col-lg-5"  >
           <form action="estaciones.php" method="post">
              <input type="hidden" name="tiempo" value="<?php echo($tiempo); ?>" />
              <input type="hidden" name="estado" value="<?php echo($estado); ?>" />
              <table  class="table table-bordered" id="datos_carretera">
                <tr> 
                  <td>Caseta</td> 
                  <td> <input name="bus_caseta" type="text" class="input_login" /></td>
                </tr>
                <tr> 
                  <td>Estacion</td> 
                  <td><input name="bus_estacion" type="text" class="input_login" /></td>
                </tr>
                <tr> 
                  <td>Carretera</td> 
                  <td><input name="bus_carretera" type="text" class="input_login" /></td>
                </tr>
                <tr> 
                  <td></td> 
                  <td><input name="enviar" type="submit" value="Buscar" /></td>
                </tr>
              </table>
            </form>
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
        <table class="table table-bordered" >
          <tr> 
            <td>Número</td> 
            <td>Caseta</td> 
            <td>Estacion</td> 
            <td>Movimiento</td> 
            <td>Carretera</td> 
            <td>KM</td> 
          </tr>
          <?php while($reg=mysql_fetch_array($registro))
          {
          ?>
          <tr> 
            <td id="datos_detalle_n">
              <?php echo("<a class=\"linkestacion\" href=\"estaciones_detalle.php?tiempo=$tiempo&estado=$estado&estacion=$reg[id_estacion]\">$reg[id_estacion]</a>"); ?>
            </td> 
            <td id="datos_detalle_n">
              <?php echo("<a class=\"linkestacion\" href=\"estaciones_detalle.php?tiempo=$tiempo&estado=$estado&estacion=$reg[id_estacion]\">$reg[cve_capufe]</a>");?>
            </td> 
            <td id="datos_detalle_n">
              <?php echo("<a class=\"linkestacion\" href=\"estaciones_detalle.php?tiempo=$tiempo&estado=$estado&estacion=$reg[id_estacion]\">$reg[nombre]</a>");?>
            </td> 
            <td id="datos_detalle_n">
              <?php echo("<a class=\"linkestacion\" href=\"estaciones_detalle.php?tiempo=$tiempo&estado=$estado&estacion=$reg[id_estacion]\">$reg[movimiento]</a>");?>
            </td> 
            <td id="datos_detalle_n">
              <?php echo("<a class=\"linkestacion\" href=\"estaciones_detalle.php?tiempo=$tiempo&estado=$estado&estacion=$reg[id_estacion]\">$reg[nombre_carr_capufe]</a>");?>
            </td> 
            <td id="datos_detalle_n">
              <?php   $s_temp=number_format($reg['km'],2,'.',',');
              echo("<a class=\"linkestacion\" href=\"estaciones_detalle.php?tiempo=$tiempo&estado=$estado&estacion=$reg[id_estacion]\">$s_temp</a>");?>
            </td> 
          </tr>
          <?php } ?>
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