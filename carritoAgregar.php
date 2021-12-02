<?php  
	include 'inc/conexion.php';
	
	$producto = $_POST["productosId"];
	$cantidadIngresada = $_POST["cantidad"];
	$cliente_id = $_POST["clienteID"];
	date_default_timezone_set('America/Mexico_City');
	setlocale(LC_ALL,'es_ES');
	$horaMexico = strftime("%H:%M:%S");
	$fechaMexico = date("Y") ."/" .date("m") ."/" .date("d");

	if($cantidadIngresada == "")
	{
		header("Location: alerta.php?tipo=fracaso&operacion=¡Ingrese una cantidad!&destino=carritoVerProductos.php");
	}

	else
	{
		$ins=$con->prepare("INSERT INTO carrito VALUES(?,?,?,?,?,?)");
		$ins->bind_param("iissss",$id,$cliente_id,$producto,$cantidadIngresada,$fechaMexico,$horaMexico);
		
		if($ins->execute())
		{
			header("Location: alerta.php?tipo=exito&operacion=¡Agregado al Carrito!&destino=carritoVerProductos.php");	
		}
		
		else
		{
		   header("Location: alerta.php?tipo=fracaso&operacion=Error al agregar al carrito&destino=carritoVerProductos.php");
		}			
	}
?>