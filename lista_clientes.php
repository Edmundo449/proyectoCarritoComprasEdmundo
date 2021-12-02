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
                $sel = $con->prepare("SELECT *from clientesfrecuentes");
                $sel->execute();
                $res = $sel->get_result();
                ?>
                <center>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="50%">
                    <thead>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
					<th>Sexo</th>
					<th>Teléfono</th>
					<th>Celular</th>
					<th>Correo</th>
                    </thead>
                    <tfoot>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
					<th>Sexo</th>
					<th>Teléfono</th>
					<th>Celular</th>
					<th>Correo</th>
                    </tfoot>
                    <tbody>
                        <?php while ($f = $res->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <?php echo $f['cliente_id'] ?>
                                </td>
								
                                <td>
                                    <?php echo $f['cliente_nombre'] ?>
                                </td>
								
								<td>
                                    <?php echo $f['cliente_sexo'] ?>
                                </td>
								
								<td>
                                    <?php echo $f['cliente_telefono'] ?>
                                </td>
								
								<td>
                                    <?php echo $f['cliente_celular'] ?>
                                </td>
								
								<td>
                                    <?php echo $f['cliente_correo_e'] ?>
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