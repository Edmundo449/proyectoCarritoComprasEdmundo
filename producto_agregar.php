<?php
$id_marca_seleccionada = $_GET['marca_id'];
$nombre_marca_seleccionada = $_GET['marca_nombre'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Datos del Nuevo Producto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--código que incluye Bootstrap-->
        <?php include'inc/incluye_bootstrap.php' ?>
        <!--termina código que incluye Bootstrap-->

    </head>
    <body>
        <!--código que incluye el menú responsivo-->
        <?php include'inc/incluye_menu.php' ?>
        <!--termina código que incluye el menú responsivo-->
		<div class="container" style="background-image: url(img/01.jpg);">
            <div class="jumbotron" style="background-image: url(img/00.jpg);">
			<form enctype="multipart/form-data" role="form" id="login-form" method="post" class="form-signin" action="producto_guardar.php">
                    <div class="h2">
                        Detalles del producto
                    </div>

                    <div class="form-group">
                        <label>ID de la marca seleccionada (<?php echo $nombre_marca_seleccionada ?>)</label>
                        <input type="text" id="marca_id" class="form-control" name="marca_id" value="<?php echo $id_marca_seleccionada ?>" readonly="" 
                               placeholder="<?php echo $nombre_marca_seleccionada ?>">
                    </div>

                    <div class="form-group">
                        <label>Nombre del producto</label>
                        <input type="text" class="form-control" id="nombre_de_producto" name="nombre_de_producto"
                               placeholder="Ingresa nombre del producto" style="text-transform:uppercase;" required>
                    </div>
                    <div class="form-group">
                        <label>Descripci&oacute;n del producto</label>
                        <input type="text" class="form-control" id="descripcion_de_producto" name="descripcion_de_producto"
                               placeholder="Ingresa descripci&oacute;n del producto" style="text-transform:uppercase;">
                    </div>
					
                    <div class="form-group">
                        <label>Precio del producto</label>
                        <input type="number" class="form-control" id="precio_de_producto" name="precio_de_producto"
                               placeholder="Ingresa el precio del producto" style="text-transform:uppercase;">
                    </div>
					
                     <div class="form-group">
                        <label class="custom-file">Selecciona una imagen en formato jpg o png</label>
                        <input type="file" id="foto" name="foto" class="custom-file-input">
                        <span class="custom-file-control"></span>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <input type="reset" class="btn btn-default" value="Limpiar">
                </form>
            </div>
        </div>
    </body>
</html>

