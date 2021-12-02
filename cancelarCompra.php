<?php  
	include 'inc/conexion.php';

    $ins=$con->prepare("DELETE FROM carrito");
    if($ins->execute()){
        header("Location: alerta.php?tipo=exito&operacion=Compra Cancelada con éxito&destino=verCarrito.php");	
    }
    else{
       header("Location: alerta.php?tipo=fracaso&operacion=No se pudo completar la solicitud, intente más tarde&destino=verCarrito.php");
    }
?>