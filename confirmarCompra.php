<?php  
	include 'inc/conexion.php';

    $ins=$con->prepare("INSERT INTO comprasrealizadas (venta_realizada_id, cliente_id, productos_confirmados_id, cantidad_producto, fecha_venta, hora_venta) SELECT * FROM carrito");
    if($ins->execute()){
		header("Location: alerta.php?tipo=exito&operacion=¡Compra Realizada!&destino=carritoVerProductos.php");
		$ins2=$con->prepare("DELETE FROM carrito");
		$ins2->execute();
    }
    else{
		header("Location: alerta.php?tipo=fracaso&operacion=Error al confirmar compra&destino=carritoVerProductos.php");
    }
?>