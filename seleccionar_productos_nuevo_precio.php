<!DOCTYPE html>
<html>
    <head>
        <title>ACTUALIZAR PRECIOS DE PRODUCTOS</title>
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
                <h2>Selecciona un producto para agregarle un nuevo precio</h2>
                <?php
                $sel = $con->prepare("SELECT *from productos");
                $sel->execute();
                $res = $sel->get_result();
                ?>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <th>Id Producto</th>
                    <th>Marca</th>
                    <th>Nombre del producto</th>
                    <th>Descripcion del producto</th>
					<th>Imagen</th>
                    <th>Clic para seleccionar</th>
                    </thead>
                    <tfoot>
                    <th>Id Producto</th>
                    <th>Marca</th>
                    <th>Nombre del producto</th>
                    <th>Descripcion del producto</th>
					<th>Imagen</th>
                    <th>Clic para seleccionar</th>
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
                                    <img class="img-responsive" src="<?php echo $f['productos_imagen']?>"/>
                                </td>
								
                                <td>
								    <a href="#">Seleccionar</a>
                                    <!--<a href="refacciones_cotizar.php?refaccion_id=<?php echo $f['refaccion_id'] ?>&refaccion_nombre=<?php echo $f['refaccion_nombre'] ?>">Seleccionar</a>
									-->
                                </td>
                            </tr>
                            <?php
                        }
                        $sel->close();
                        $con->close();
                        ?>
                    <tbody>
                </table>

            </div>
        </div>
        <?php include'inc/incluye_datatable_pie.php'; ?>
    </body>
</html>
