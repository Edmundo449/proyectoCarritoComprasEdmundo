<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Clientes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--código que incluye Bootstrap-->
        <?php
        include'inc/incluye_bootstrap.php';
        include 'inc/incluye_datatable_head.php';
        include 'inc/conexion.php';
        ?>

    </head>
    <body>		
        <!--código que incluye el menú responsivo-->
        <?php include'inc/incluye_menu.php' ?>
        <!--termina código que incluye el menú responsivo-->
		<div class="container" style="background-image: url(img/01.jpg);">
            <div class="jumbotron" style="background-image: url(img/00.jpg);">			
                <h2>Selecciona un producto para agregarlo al carrito de compras</h2>
                <?php
                $sel = $con->prepare("SELECT *from productos");
                $sel->execute();
                $res = $sel->get_result();
                ?>
                <center>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="50%">
                    <thead>
                    <th>ID Producto</th>
                    <th>ID Marca</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Imagen</th>
                    </thead>
                    <tfoot>
                    <th>ID Producto</th>
                    <th>ID Marca</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Imagen</th>
                    </tfoot>
                    <tbody>
                        <?php while ($f = $res->fetch_assoc()) { ?>
                            <tr>
								<td>
                                    <?php echo $f['productos_id'] ?>
                                </td>
								
								<td>
                                    <?php echo $f['marca_id'] ?>
                                </td>
								
                                <td>
                                    <?php echo $f['productos_nombre'] ?>
                                </td>
								
                                <td>
                                    <?php echo $f['productos_descripcion'] ?>
                                </td>
								
								<td>
                                    <?php echo $f['precio_producto'] ?>
                                </td>
								
								<td>
                                    <img class="img-responsive" src="<?php echo $f['productos_imagen']?>"/>
                                </td>
                            </tr>
                            <?php
                        }
						$sel->close();
                        ?>
                    <tbody>
                </table>				
				</center>
            </div>
        </div>
        <?php include'inc/incluye_datatable_pie.php'; ?>
    </body>
</html>