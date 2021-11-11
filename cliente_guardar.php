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
        echo 
		'<style type="text/css">
		  p { 
				padding: 20px;
				width: 100%;
				background-color: #04AA6D;
				color: white;
				margin-bottom: 15px;
				font-size: 28px;
				margin-bottom: 15px;
			}
		</style>
		<div class="alertBien">				
			<center> <p> <strong>¡HECHO!</strong> El cliente se dió de alta con éxito. </p> </center>
		</div>';
		require("index.php");	
    }
    else{
        echo 
		'<style type="text/css">
		  p { 
				padding: 20px;
				width: 100%;
				background-color: #f44336;
				color: white;
				font-size: 28px;
				margin-bottom: 15px;
			}
		</style>
		<div class="alertBien">				
			<center> <p> <strong>¡ERROR!</strong> El cliente no se pudo registrar.. </p> </center>
		</div>';
		require("index.php");	
    }
}