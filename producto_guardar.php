<?php
include 'inc/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_del_producto_post = strtoupper($_POST['nombre_del_producto']);
    $categoria_del_producto_post = strtoupper($_POST['categoria_producto']);
    $cantidad_del_producto_post = strtoupper($_POST['cantidad']);
    $precio_del_producto_post = strtoupper($_POST['precio']);
	$disponibilidad = "SI";
    $estado_del_producto_post = strtoupper($_POST['estado']);
	$fecha_ingreso_post = strtoupper($_POST['fechaIng']);
	$clasificacion_del_producto_post = strtoupper($_POST['clasif_prod']);

	
	try
	{			
		$cons = "SELECT * FROM inventario where Producto = '$nombre_del_producto_post'";
		$cons = "SELECT * FROM inventario where Producto = '$nombre_del_producto_post'";
		$res = $objetoPDO->prepare($cons);
		$res->execute();

		if ($res->rowCount() > 0) 
		{
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
					<center> <p> <strong>¡ERROR!</strong> El Producto que intenta registrar ya existe.</p> </center>
				</div>';
			require("index.php");	
		}

		else
		{
			if($cantidad_del_producto_post == "0")
			{
				$consultaEjecutar = "insert into inventario (Producto, Categoria, Cantidad, PrecioUnitario, Disponibilidad, Estado, FechaIngreso, Clasificación)
				values ('$nombre_del_producto_post', '$categoria_del_producto_post', '$cantidad_del_producto_post', '$precio_del_producto_post', 'NO', '$estado_del_producto_post', '$fecha_ingreso_post', '$clasificacion_del_producto_post')";

				$resultado = $objetoPDO->query($consultaEjecutar);
				if ($resultado) 
				{
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
							<center> <p> <strong>¡REGISTRADO!</strong> El producto se registró con éxito</p> </center>
						</div>';
					require("index.php");	
				}
			}
				
			else
			{
				$consultaEjecutar = "insert into inventario (Producto, Categoria, Cantidad, PrecioUnitario, Disponibilidad, Estado, FechaIngreso, Clasificación)
				values ('$nombre_del_producto_post', '$categoria_del_producto_post', '$cantidad_del_producto_post', '$precio_del_producto_post', 'SI', '$estado_del_producto_post', '$fecha_ingreso_post', '$clasificacion_del_producto_post')";
				$resultado = $objetoPDO->query($consultaEjecutar);

				if ($resultado) 
				{
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
							<center> <p> <strong>¡REGISTRADO!</strong> El producto se registró con éxito</p> </center>
						</div>';
					require("index.php");	
				}
			}
		}
	}

	catch(PDOException $e)
	{
		echo 'Falló la conexión: ' . $e->getMessage();
	}
	$objetoPDO->close();
}
