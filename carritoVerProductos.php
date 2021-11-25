<!DOCTYPE html>
<html>
    <head>
        <title>VENTA DE PRODUCTOS</title>
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
                    <th>Nombre del producto</th>
                    <th>Descripcion del producto</th>
					<th>Imagen</th>
                    </thead>
                    <tfoot>
                    <th>Nombre del producto</th>
                    <th>Descripcion del producto</th>
					<th>Imagen</th>
                    </tfoot>
                    <tbody>
                        <?php while ($f = $res->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <?php echo $f['productos_nombre'] ?>
                                </td>
                                <td>
                                    <?php echo $f['productos_descripcion'] ?>
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
				<form method="post" action="carritoAgregar.php">
				
				<?php
                $sel2 = $con->prepare("SELECT *from productos");
                $sel2->execute();
                $res2 = $sel2->get_result();
                ?>				
					<div class="form-group">
						<font color="black" face="Times New Roman" size="6"> Selecciona un producto: </font>
                        <select class="selectpicker" name="productosId" id="productosId">
                            <?php while ($f = $res2->fetch_assoc()) { ?>
                                <option value="<?php echo $f['productos_id'] ?>"><?php echo $f['productos_nombre'] ?></option>
                            <?php
								}
								$sel2->close();
								$con->close();
                            ?>
                        </select>                    
					
					<font color="black" face="Times New Roman" size="6"> Cantidad: </font>
					<input type="number" min = "1" max = "10" name = "cantidad">
					
					<input type="submit" value="Agregar al Carro">
					
					<a href="verCarrito.php" style="text-decoration:none">
						<p> <img src = "img/03.png" width = "75px"> </p>
						<font color="black" size="5"> Ver Carrito </font>
					</a> 	
				</div>
				</center>
            </div>
        </div>
        <?php include'inc/incluye_datatable_pie.php'; ?>
    </body>
</html>