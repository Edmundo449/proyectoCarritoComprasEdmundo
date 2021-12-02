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
                $sel = $con->prepare("SELECT * from comprasrealizadas");
                $sel->execute();
                $res = $sel->get_result();
                ?>
                <center>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="50%">
                    <thead>
                    <th>ID Venta</th>
					<th>ID Cliente</th>
                    <th>ID Producto Confirmado</th>
					<th>Cantidad</th>
					<th>Fecha de venta</th>
					<th>Hora de venta</th>
                    </thead>
                    <tfoot>
                    <th>ID Venta</th>
					<th>ID Cliente</th>
                    <th>ID Producto Confirmado</th>
					<th>Cantidad</th>
					<th>Fecha de venta</th>
					<th>Hora de venta</th>
                    </tfoot>
                    <tbody>
                        <?php while ($f = $res->fetch_assoc()) { ?>
                            <tr>
								<td>
                                    <?php echo $f['venta_realizada_id'] ?>
                                </td>
								
								<td>
                                    <?php echo $f['cliente_id'] ?>
                                </td>
								
								<td>
                                    <?php echo $f['productos_confirmados_id'] ?>
                                </td>
								
                                <td>
                                    <?php echo $f['cantidad_producto'] ?>
                                </td>
								
                                <td>
                                    <?php echo $f['fecha_venta'] ?>
                                </td>
								
								<td>
                                    <?php echo $f['hora_venta'] ?>
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