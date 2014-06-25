<?php
session_start();

/******/
 $tiempo=$_REQUEST['tiempo'];
 $estado=$_REQUEST['estado'];

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
        <div class="col-md-6 col-lg-6" align="left">Año Consulta: <b><?php echo($tiempo);?></b></div>  
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
       <!-- table left -->
       <div class="col-md-3 col-lg-3">
          <table class="table table-condensed" >
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=1 ">Aguascalientes</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=2 ">Baja California</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=3 ">Baja California Sur</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=4 ">Campeche</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=5 ">Coahuila</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=6 ">Colima</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=7 ">Chiapas</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=8 ">Chihuahua</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=9 ">Distrito Federal</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=10">Durango</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=11">Guanajuato</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=12">Guerrero</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=13">Hidalgo</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=14">Jalisco</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=15">México</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=16">Michoacan</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=17">Morelos</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=18">Nayarit</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=19">Nuevo Leon</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=20">Oaxaca</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=21">Puebla</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=22">Queretaro</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=23">Quintana Roo</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=24">San Luis Potosi</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=25">Sinaloa</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=26">Sonora</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=27">Tabasco</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=28">Tamaulipas</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=29">Tlaxcala</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=30">Veracruz</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=31">Yucatan</a></td></tr>
            <tr><td ><a href="carreteras.php?tiempo=<?php echo($tiempo); ?>&estado=32">Zacatecas</a></td></tr>
          </table>
        </div>
        <div class="col-md-9 col-lg-9">
          <div class="col-md-12 col-lg-12">
              <div class="col-md-7 col-lg-7">
                 <p><h1><?php echo($nombre_estado); ?></h1></p>
                 <p><span >Carreteras de la Entidad Federativa</span></p>
              </div>
              <div class="col-md-5 col-lg-5">
                    <?php echo "<a href='img".$tiempo."/".$imagen."' target='_blank' title='Mapa AutoCad'><img width='220' src='img".$tiempo."/".$imagen_mini."'/> </a>"; ?>
                    <?php echo "<p align='center'><a href='gm_web_estado_v1.php?tiempo=".$tiempo."&estado=".$estado."' target='_blank' title='Google Maps'><h3>Google Maps</h3></a></p>"; ?>

              </div>
          </div>
          <div class="col-md-12 col-lg-12">
               <?php
                    $sql="select ";
                    $sql.="a.ruta as ruta , ";
                    $sql.="b.id_numero as numero, ";
                    $sql.="a.nombre as nombre, ";
                    $sql.="a.id_carretera as id_carretera ";
                    $sql.="from ";
                    $sql.="carreteras a, ";
                    $sql.="estados_carreteras b ";
                    $sql.="where ";
                    $sql.="a.id_tiempo=b.id_tiempo and ";
                    $sql.="a.id_carretera=b.id_carretera and ";
                    $sql.="b.id_tiempo=$tiempo and ";
                    $sql.="b.id_estado=$estado ";

                    $registro=mysql_query($sql,$conexion) or die("Error 2:".mysql_error());

                    echo "<table class='table table-condensed'";
                    echo "<tr>";
                    echo "<th >Ruta</th>";
                    echo "<th >Num</th>";
                    echo "<th >Descripción</th>";
                    echo "</tr>";

                    while($reg=mysql_fetch_array($registro))
                    {
                      echo "<tr><td> <a href=carreteras_detalle.php?tiempo=$tiempo&estado=$estado&carretera=$reg[id_carretera]>$reg[ruta]</a></td>";
                      echo "<td> <a href=carreteras_detalle.php?tiempo=$tiempo&estado=$estado&carretera=$reg[id_carretera]>$reg[numero]</a></td>";
                      echo "<td> <a href=carreteras_detalle.php?tiempo=$tiempo&estado=$estado&carretera=$reg[id_carretera]>$reg[nombre]</a></td></tr>";
                    } 
                    echo("</table>");
               ?>
          </div>

        </div>




      </div>

      <div class="footer">
        <p align="center" >Los datos que se presentan en este desarrollo se han tomado de la página de SCT</p>
      </div>

    </div> <!-- /container -->
<?php  mysql_close($conexion); ?>

<script type="text/javascript">
  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
  var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
  var f=new Date();
    $('#fecha').text(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());

</script>
</body>
</html>