<!DOCTYPE html>
<html>
    <head>
        <title>Carrito</title>
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
                <h2>A continuación se muestran los productos que solicitó, verifique su compra.</h2>
                <?php
                $sel = $con->prepare("SELECT * from carrito");
                $sel->execute();
                $res = $sel->get_result();
                ?>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <th>ID Venta</th>
					<th>ID Cliente</th>
                    <th>Productos ID</th>
                    <th>Cantidad del producto solicitada</th>					
                    <th>Fecha de venta</th>
					<th>Hora de venta</th>
                    </thead>
                    <tfoot>
                    <th>ID Venta</th>
					<th>ID Cliente</th>
                    <th>Productos ID</th>
                    <th>Cantidad del producto solicitada</th>
                    <th>Fecha de venta</th>
					<th>Hora de venta</th>
                    </tfoot>
                    <tbody>
                        <?php while ($f = $res->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <?php echo $f['venta_id'] ?>
                                </td>
								<td>
                                    <?php echo $f['cliente_id'] ?>
                                </td>
                                <td>
                                    <?php echo $f['productos_id'] ?>
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
                        $con->close();
                        ?>
                    <tbody>
                </table>
				
			<center>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">			
					<tr> 
						<td> 
							
							<a href="confirmarCompra.php" style="text-decoration:none">
								<center> <p> <img src = "img/04.png" width = "75px"> </p> <font color="Black" size="5"> Confirmar Compra </font> </center>
							</a> 
						</td>
						
						<td> 
							<a href="cancelarCompra.php" style="text-decoration:none">
								<center> <p> <img src = "img/05.png" width = "75px"> </p> <font color="Black" size="5"> Cancelar Compra </font> </center>
							</a>
						</td>
					</tr>
				</table
			</center>
            </div>
        </div>
        <?php include'inc/incluye_datatable_pie.php'; ?>
    </body>
</html>
