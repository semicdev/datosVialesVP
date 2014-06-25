<?php  


	$dom = new DOMDocument("1.0");
	$node = $dom->createElement("mapa");
	$parnode = $dom->appendChild($node); 
	
	$carretera=$_REQUEST["carretera"];
	$estado=$_REQUEST["estado"];
	$tiempo=$_REQUEST["tiempo"];
	
	
	$connection=mysql_connect ("127.0.0.1","infode30_uno","abc123456");
	if (!$connection) 
	{
		die('Not connected : '.mysql_error());
	} 

	$db_selected = mysql_select_db("infode30_datos_viales",$connection);
	if (!$db_selected) 
	{
		die ('Can\'t use db : '.mysql_error());
	} 
	
	$query = "SELECT lat,lng,level FROM estados WHERE id_estado=$estado";
	$result = mysql_query($query);
	
	if (!$result) 
	{  
		die('Invalid query: '.mysql_error());
	} 
		
	while ($row = @mysql_fetch_assoc($result))
	{  
		$node = $dom->createElement("estado");  
		$newnode = $parnode->appendChild($node);  
		$newnode->setAttribute("lat",$row['lat']);
		$newnode->setAttribute("lng",$row['lng']);
		$newnode->setAttribute("level",$row['level']);
	} 
	
	$query = "select a.id_carretera carretera,a.nombre nombre ";
	$query .= "FROM ";
    $query .= "carreteras a, ";
    $query .= "estados_carreteras b ";
	$query .= "where ";
    $query .= "a.id_tiempo=b.id_tiempo and ";
    $query .= "a.id_carretera=b.id_carretera and ";
    $query .= "a.gps=1 and ";
    $query .= "b.id_tiempo=$tiempo and ";
    $query .= "b.id_estado=$estado and ";
	$query .= "a.nombre='$carretera' ";
	
	$result2 = mysql_query($query);
		
	if (!$result2) 
	{  
		die('Invalid query: '.mysql_error());
	} 
	
	while ($row2 = @mysql_fetch_assoc($result2))
	{
		$carretera=$row2['carretera'];
		
		$contenido=$row2['nombre'];
		$contenido=str_replace("á","&aacute;",$contenido);
		$contenido=str_replace("é","&eacute;",$contenido);
		$contenido=str_replace("í","&iacute;",$contenido);
		$contenido=str_replace("ó","&oacute;",$contenido);
		$contenido=str_replace("ú","&uacute;",$contenido);
		$contenido=str_replace("ñ","&ntilde;",$contenido); 
		$contenido=str_replace("Á","&Aacute;",$contenido);
		$contenido=str_replace("É","&Eacute;",$contenido);
		$contenido=str_replace("Í","&Iacute;",$contenido);
		$contenido=str_replace("Ó","&Oacute;",$contenido);
		$contenido=str_replace("Ú","&Uacute;",$contenido);
		$contenido=str_replace("Ñ","&Ntilde;",$contenido);
		$contenido=str_replace("º","&ordm;",$contenido);
		$contenido=str_replace("ü","&uuml;",$contenido);		
		$contenido=str_replace("Ü","&Uuml;",$contenido);		
		$carretera_nombre=$contenido;
						
		$node = $dom->createElement("estaciones");  
		$node_est = $parnode->appendChild($node);
		
		$query = "SELECT a.id_estacion,a.lat,a.lng,a.punto_generador,a.tipo,a.sentido,b.tdpa ";
		$query .= "FROM estaciones a, tdpa b ";
		$query .= "WHERE a.id_estacion=b.id_estacion and a.id_tiempo=b.id_tiempo and a.id_carretera=b.id_carretera and ";
		$query .= "a.id_tiempo=$tiempo and a.id_carretera=$carretera and a.gps=1";
		
		$result = mysql_query($query);
		
		if (!$result) 
		{  
			die('Invalid query: '.mysql_error());
		} 
			
		while ($row = @mysql_fetch_assoc($result))
		{  
			$node = $dom->createElement("punto");  
			$newnode = $node_est->appendChild($node);
			$newnode->setAttribute("id_estacion",$row['id_estacion']);
			$newnode->setAttribute("id_estado",$estado);
			$newnode->setAttribute("id_carretera",$carretera);
			$newnode->setAttribute("id_tiempo",$tiempo);
			$newnode->setAttribute("lat",$row['lat']);
			$newnode->setAttribute("lng",$row['lng']);
			$newnode->setAttribute("tipo",$row['tipo']);
			$newnode->setAttribute("sentido",$row['sentido']);
			$newnode->setAttribute("tdpa",$row['tdpa']);
			
			$contenido=$row['punto_generador'];						
			$contenido=str_replace("á","&aacute;",$contenido);
			$contenido=str_replace("é","&eacute;",$contenido);
			$contenido=str_replace("í","&iacute;",$contenido);
			$contenido=str_replace("ó","&oacute;",$contenido);
			$contenido=str_replace("ú","&uacute;",$contenido);
			$contenido=str_replace("ñ","&ntilde;",$contenido); 
			$contenido=str_replace("Á","&Aacute;",$contenido);
			$contenido=str_replace("É","&Eacute;",$contenido);
			$contenido=str_replace("Í","&Iacute;",$contenido);
			$contenido=str_replace("Ó","&Oacute;",$contenido);
			$contenido=str_replace("Ú","&Uacute;",$contenido);
			$contenido=str_replace("Ñ","&Ntilde;",$contenido);									
			$contenido=str_replace("º","&ordm;",$contenido);
			$contenido=str_replace("ü","&uuml;",$contenido);		
			$contenido=str_replace("Ü","&Uuml;",$contenido);		
			$newnode->setAttribute("nombre",$contenido);	
			
			$newnode->SetAttribute("nombre_carretera",$carretera_nombre);
								
		} 
		
	}
	
	header("Content-type: text/xml"); 
	
	echo $dom->saveXML();

?>