<?php
include 'inc/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_del_cliente_post = strtoupper($_POST['id_cliente']);
    $nombre_negocio = strtoupper($_POST['nombre_negocio']);
    $direccion_negocio = strtoupper($_POST['direccion_negocio']);
    $telefono = strtoupper($_POST['telefono']);
    $celular = strtoupper($_POST['celular']);
    $correo_negocio = strtoupper($_POST['correo_negocio']);
    $ins=$con->prepare("INSERT INTO sucursal_cliente VALUES(?,?,?,?,?,?,?)");
    $ins->bind_param("iisssss",$id,$id_del_cliente_post,$nombre_negocio,$direccion_negocio,$telefono,$celular,$correo_negocio);
    if($ins->execute()){
        header("Location: alerta.php?tipo=exito&operacion=Negocio Guardada&destino=negocio_registrar.php");
    }
    else{
        header("Location: alerta.php?tipo=fracaso&operacion=Negocio No Guardada&destino=negocio_registrar.php");
    }
    $ins->close();
    $con->close();
}
