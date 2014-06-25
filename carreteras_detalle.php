<?php
session_start();

 $tiempo=$_REQUEST['tiempo'];
 $estado=$_REQUEST['estado'];
 $carretera=$_REQUEST['carretera'];

$conexion=mysql_connect("127.0.0.1","infode30_uno","abc123456") or die("Problemas en la conexion");

//$conexion = mysql_connect("localhost","root","123") or die("Problemas en la conexion");
mysql_select_db("infode30_datos_viales",$conexion) or die("Problemas en la selección de la base de datos");
mysql_query("SET NAMES 'UTF8'");

  $sql="select ";
  $sql.="nombre_corto, ";
  $sql.="abreviacion ";
  $sql.="from ";
  $sql.="estados ";
  $sql.="where ";
  $sql.="id_estado=$estado ";

$registro=mysql_query($sql,$conexion) or die("Error 1:".mysql_error());

  while($reg=mysql_fetch_array($registro))
  {
    $nombre_estado=$reg['nombre_corto'];
    $imagen_mini="x_".$reg["abreviacion"].".jpg";
    $imagen=$reg["abreviacion"].".jpg";
    $pdf=$reg["abreviacion"]."_".$tiempo.".pdf";
    $xls=$reg["abreviacion"]."_".$tiempo.".xls";
  } 


  $sql="select ";
  $sql.="a.clave, ";
  $sql.="a.nombre, ";
  $sql.="a.ruta, ";
  $sql.="a.id_tiempo, ";
  $sql.="b.id_numero ";
  $sql.="from ";
  $sql.="carreteras a, ";
  $sql.="estados_carreteras b ";
  $sql.="where ";
  $sql.="a.id_tiempo=b.id_tiempo and ";
  $sql.="a.id_carretera=b.id_carretera and  ";
  $sql.="a.id_tiempo=$tiempo and ";
  $sql.="b.id_estado=$estado and ";
  $sql.="a.id_carretera=$carretera ";

  $registro=mysql_query($sql,$conexion) or die("Error 2:".mysql_error());

  while($reg=mysql_fetch_array($registro))
  {
    $clave=$reg["clave"];
    $nombre=$reg["nombre"];
    $ruta=$reg["ruta"];
    $id_tiempo=$reg["id_tiempo"];
    $id_numero=$reg["id_numero"];
  }

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<title> Carreteras </title>
  <link rel="stylesheet" type="text/css" href="bts/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="bts/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <style type="text/css">



  </style>
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
                      <li><a href="carreteras.php?tiempo=<?php echo$tiempo?>&estado=1">Red Nacional de Carreteras Pavimentadas</a></li>
                      <li class="divider"></li>
                      <li><a href="estaciones.php?tiempo=<?php echo $tiempo;?>&estado=1">Estaciones Permanentes y Conteo de Vehiculos</a></li>
                </ul>
             </li>
              
               <li class="dropdown ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">TDPA <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="carreteras.php?tiempo=2008&estado=<?php echo($estado); ?>">TDPA 2008</a></li>
                    <li><a href="carreteras.php?tiempo=2009&estado=<?php echo($estado); ?>">TDPA 2009</a></li>
                    <li><a href="carreteras.php?tiempo=2010&estado=<?php echo($estado); ?>">TDPA 2010</a></li>
                    <li><a href="carreteras.php?tiempo=2011&estado=<?php echo($estado); ?>">TDPA 2011</a></li>
                    <li><a href="carreteras.php?tiempo=2012&estado=<?php echo($estado); ?>">TDPA 2012</a></li>
                    <li><a href="carreteras.php?tiempo=2013&estado=<?php echo($estado); ?>">TDPA 2013</a></li>
                </ul>
              </li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Exportar <b class="caret"></b></a>           
                    <ul class="dropdown-menu">
                          <li><a href="<?php echo("./rep".$tiempo."/".$pdf) ?>" target="_blank">PDF</a> </li>
                          <li><a href="<?php echo("./rep".$tiempo."/".$xls) ?>" target="_blank">Excel</a> </li>
                    </ul>
                     <li><a href="javascript: history.go(-1)"  >Regresar </a></li>
                     <li><a href="salir.php" title="Cerrar sesion">Cerrar sesión</a></li>
                   </li> 
            </ul>

          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

      </div>  

      <div class="row">
        <p id="fecha" align="right"></p>
      </div>
      <div class="row">
       <!-- table left -->
       <div class="col-md-6 col-lg-6">
          <table class="table table-condensed ">
              <tr><th >Clave:</th><td ><?php echo($clave) ?></td></tr>
              <tr><th >Carretera:</th><td ><?php echo($nombre) ?></td></tr>
              <tr><th >Ruta:</th><td ><?php echo($ruta) ?></td></tr>
              <tr><th >Año:</th><td ><?php echo($id_tiempo) ?></td></tr>
              <tr><th >Numero:</th><td ><?php echo($id_numero) ?></td></tr>        
           </table>
        </div>
        <div class="col-md-6 col-lg-6">
             <?php echo "<a href='img".$tiempo."/".$imagen."' target='_blank' title='Mapa AutoCad'><img width='360' height='220' src='img".$tiempo."/".$imagen_mini."'/> </a>"; ?>
             <?php echo "<h3 align='center'> <a href='gm_web_carretera_v1.php?tiempo=".$tiempo."&estado=".$estado."&carretera=".$carretera."' target='_blank'>Google Maps </a></h3> "; ?>
          </div>
      </div>

</div> <!-- /container -->
 <div class="container" id="container">
 <div class="row">
    <div class="col-md-12 col-lg-12">
        <h3 align="center" >CLASIFICACION VEHICULAR EN POR CIENTO</h3>
        <?php
              $sql="select ";
              $sql.="c.punto_generador, ";
              $sql.="c.km, ";
              $sql.="c.tipo, ";
              $sql.="c.sentido, ";
              $sql.="d.tdpa, ";
              $sql.="d.a, ";
              $sql.="d.b, ";
              $sql.="d.c2, ";
              $sql.="d.c3, ";
              $sql.="d.t3s2, ";
              $sql.="d.t3s3, ";
              $sql.="d.t3s2r4, ";
              $sql.="d.otros, ";
              $sql.="d.aa, ";
              $sql.="d.bb, ";
              $sql.="d.cc, ";
              $sql.="d.d, ";
              $sql.="d.k, ";
              $sql.="c.seccion_tipo,";    
              $sql.="c.nivel_servicio, ";
              $sql.="c.resumen ";
              $sql.="from ";
              $sql.="tdpa d right join ( ";
              $sql.="estaciones c inner join ( ";
              $sql.="carreteras a inner join estados_carreteras b on ( ";
              $sql.="a.id_tiempo=b.id_tiempo and ";
              $sql.="a.id_carretera=b.id_carretera ";
              $sql.=") ";
              $sql.=") on (c.id_tiempo=a.id_tiempo and c.id_carretera=a.id_carretera) ";
              $sql.=") on (d.id_tiempo=c.id_tiempo and d.id_estacion=c.id_estacion and d.id_carretera=c.id_carretera)  ";
              $sql.="where ";
              $sql.="b.id_tiempo=$tiempo and ";
              $sql.="b.id_estado=$estado and ";
              $sql.="a.id_carretera=$carretera ";
              $sql.="order by ";
              $sql.="c.km, ";
              $sql.="c.tipo, ";
              $sql.="c.sentido "; 

              $registro=mysql_query($sql,$conexion) or
              die("Error:".mysql_error());

              echo "<table class='table table-condensed table-bordered'>";
              echo "<tr>";
              echo "<th >Lugar</th>";
              echo "<th >Km</th>";
              echo "<th >TE</th>";
              echo "<th >SC</th>";
              echo "<th >thPA</th>";
              echo "<th >A</th>";
              echo "<th >B</th>";
              echo "<th >C2</th>";
              echo "<th >C3</th>";
              echo "<th >T3S2</th>";
              echo "<th >T3S3</th>";
              echo "<th >T3S2R4</th>";
              echo "<th >Otros</th>";
              echo "<th >A</th>";
              echo "<th >B</th>";
              echo "<th >C</th>";
              echo "<th >D</th>";
              echo "<th >K'</th>";
              echo "<th >Seccion Tipo</th>";
              echo "<th >Nivel Servicio</th>";
              echo "<th >Resumen Aforo</th>";
              echo "</tr>";

              while($reg=mysql_fetch_array($registro))
              {
                echo "<tr>";     
                echo "<td >$reg[punto_generador]</td>";
                $s_temp=number_format($reg['km'],2,'.',',');
                echo "<td>$s_temp</td>";
                echo "<td>$reg[tipo]</td>";
                echo "<td>$reg[sentido]</td>";
                $s_temp=number_format($reg['tdpa'],0,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['a'],2,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['b'],2,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['c2'],2,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['c3'],2,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['t3s2'],2,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['t3s3'],2,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['t3s2r4'],2,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['otros'],2,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['aa'],3,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['bb'],3,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['cc'],3,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['d'],3,'.',',');
                echo "<td>$s_temp</td>";
                $s_temp=number_format($reg['k'],3,'.',',');
                echo "<td>$s_temp</td>";

                $s_temp=$reg['seccion_tipo'];
                
                if($s_temp=="")
                    echo "<td ></td>"; 
                else
                    echo "<td ><a href='img$tiempo/$s_temp' target'=_blank' >Detalle</a></td>"; 

                $s_temp=$reg['nivel_servicio'];

                if($s_temp=="")
                    echo("<td ></td>"); 
                else
                    echo("<td ><a href='img$tiempo/$s_temp' target='_blank' >Detalle</a></td>"); 

                $s_temp=$reg['resumen'];
                if($s_temp=="")
                     echo "<td></td>"; 
                else
                     echo("<td><a href='img$tiempo/$s_temp' target='_blank' >Detalle</a></td>"); 
                     echo("</tr>");
                } 
          echo "</table>";
      ?>

        </div>
      </div>

      <div class="footer">
        <p align="center" >Los datos que se presentan en este desarrollo se han tomado de la página de SCT</p>
      </div>    
  </div>
<?php  mysql_close($conexion); ?>

<script type="text/javascript">
  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
  var f=new Date();
    $('#fecha').text(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());

</script>
</body>
</html>