<?php
include 'inc/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_del_cliente_post = strtoupper($_POST['nombre']);
    $sexo_post = strtoupper($_POST['sexo']);
    $telefono_post = strtoupper($_POST['telefono']);
    $celular_post = strtoupper($_POST['celular']);
    $correo_cliente_post = strtoupper($_POST['correo']);
    $id_cliente='';
    $ins=$con->prepare("INSERT INTO clientesFrecuentes VALUES(?,?,?,?,?,?)");
    $ins->bind_param("isssss",$id,$nombre_del_cliente_post,$sexo_post,$telefono_post,$celular_post,$correo_cliente_post);
    if($ins->execute()){
        header("Location: alerta.php?tipo=exito&operacion=Proveedor Guardado&destino=cliente_agregar.php");	
    }
    else{
       header("Location: alerta.php?tipo=fracaso&operacion=Proveedor No Guardado&destino=cliente_agregar.php");
    }
}