<?php
    header('Cache-Control: no-store, no-cache, must-revalidate'); 
	header('Cache-Control: post-check=0, pre-check=0', FALSE); 
 	header('Pragma: no-cache'); 
	
	$carretera=$_REQUEST["carretera"];
	$estado=$_REQUEST["estado"];
	$tiempo=$_REQUEST["tiempo"];
	
?>

<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false">					</script> 
	<script type="text/javascript"> 
	
	function downloadUrl(url,callback) {  

		var request = window.ActiveXObject ?
			new ActiveXObject('Microsoft.XMLHTTP') :
			new XMLHttpRequest;   
			
		request.onreadystatechange = function() {
	
			if (request.readyState == 4) {
				request.onreadystatechange = doNothing;
				
				callback(request.responseText, request.status);    
			}  
		};   
		
		request.open('GET', url, true);  
		request.send(null); 
	}
	
	function doNothing() {}
	 
	function parseXml(str) {       
		if (window.ActiveXObject) {         
			var doc = new ActiveXObject('Microsoft.XMLDOM');         
			doc.loadXML(str);         
			return doc;       
		} else if (window.DOMParser) 
		{         
			return (new DOMParser).parseFromString(str, 'text/xml');       
		}     
	} 
	
	function bindInfoWindow(marker, map, infoWindow, html) 
	{       
		google.maps.event.addListener(marker, 'click', function() {         
			infoWindow.setContent(html);         
			infoWindow.open(map, marker);       
		});     
	} 
		
	function initialize()
	{
		downloadUrl("gm_visor_carretera_proc_v1.php?tiempo=" +  <?php echo("\"".$tiempo."\""); ?> + "&estado=" + <?php echo("\"".$estado."\""); ?>  + "&carretera=" + <?php echo("\"".$carretera."\""); ?> , function(data) 
		{
			var xml = parseXml(data);
			var markers = xml.documentElement.getElementsByTagName("estado");
			var map_lat=0;
			var map_lng=0;
			var map_level=0;
			var i;
			var j;
			
			for (i=0; i<markers.length; i++) 
			{
				map_lat=parseFloat(markers[i].getAttribute("lat"));
				map_lng=parseFloat(markers[i].getAttribute("lng"));
				map_level=parseInt(markers[i].getAttribute("level"));
			}
			
			var latlng = new google.maps.LatLng(map_lat,map_lng);     			
			var myOptions = {       
				zoom: map_level,       
				center: latlng,       
				mapTypeId: google.maps.MapTypeId.HYBRID     
			};     
			var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
								
			markers = xml.documentElement.getElementsByTagName("estaciones");
			
			var infoWindow = new google.maps.InfoWindow; 
							
			for(i=0; i<markers.length; i++) 
			{
				markers_2 = markers[i].getElementsByTagName("punto");
							
				for(j=0; j<markers_2.length; j++) 
				{		
					map_lat=parseFloat(markers_2[j].getAttribute("lat"));
					map_lng=parseFloat(markers_2[j].getAttribute("lng"));
										
					id_estacion=markers_2[j].getAttribute("id_estacion");
					id_tiempo=markers_2[j].getAttribute("id_tiempo");
					id_estado=markers_2[j].getAttribute("id_estado");
					id_carretera=markers_2[j].getAttribute("id_carretera");
					nombre=markers_2[j].getAttribute("nombre");					
					nombre_carretera=markers_2[j].getAttribute("nombre_carretera");
					sentido=markers_2[j].getAttribute("sentido");
					tipo=markers_2[j].getAttribute("tipo");
					tdpa=markers_2[j].getAttribute("tdpa");

					var myLatlng = new google.maps.LatLng(map_lat,map_lng); 
					var marker = new google.maps.Marker({       
						position: myLatlng,        
						map: map,        
						title:nombre
					});   
					
					var myHtml ="Carretera: "+nombre_carretera+"<br>Punto Generador: "+nombre+"<br>TE: "+tipo+" SE: "+sentido+" TDPA 2010: "+tdpa+"<br>Lat: "+map_lat+" Lon: "+map_lng;
		
					bindInfoWindow(marker, map, infoWindow, myHtml); 										
				}	
			}
		}
		);
	}

    </script>
    <link href="style/style_map.css" rel="stylesheet" type="text/css" />
	</head>
	<body onload="initialize()">    
	<div id="map_canvas"></div> 
	</body>
    
</html>
