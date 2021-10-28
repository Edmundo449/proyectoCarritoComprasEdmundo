<!DOCTYPE html>
<html>
    <head>
        <title>Registrar Producto</title>
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
                <h1>Registrar un Producto</h1>
                <form role="form" id="login-form" 
                      method="post" class="form-signin" 
                      action="producto_guardar.php">
                    
                    <div class="h2">
                        DATOS DEL PRODUCTO NUEVO
                    </div>
                    <div class="form-group">
                        <label for="nombre_del_proveedor">Nombre del producto</label>
                        <input type="text" class="form-control" id="nombre_del_producto" name="nombre_del_producto"
                               placeholder="Ingresa el producto nuevo" style="text-transform:uppercase;" required>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <input type="text" class="form-control" id="categoria_producto" name="categoria_producto"
                               placeholder="Ingresa la cateogira perteneciente (Botanas, Bebidas, etc.)" style="text-transform:uppercase;">
                    </div>

                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="number" class="form-control" min = "0" max = "999" id="cantidad" name="cantidad"
                               placeholder="Ingresa la cantidad del producto" style="text-transform:uppercase;">
                    </div>

                    <label>Precio Unitario</label>
                    <input type="number" class="form-control" min = "1" max = "100" id="precio" name="precio"
                           placeholder="Ingresa el precio del producto por unidad" style="text-transform:uppercase;">
                    <br>
                    <div class="form-group">
                        <label>Estado</label>
							<select class="form-control" id="estado" name="estado">
								<option value="Activo">Activo</option>
								<option value="No activo">No Activo</option>
							</select>
                    </div>
                    <br>
					<div class="form-group">
                        <label>Fecha de Ingreso</label>
                        <input type="date" class="form-control" id="fechaIng" name="fechaIng">
                               placeholder="Ingresa la cantidad del producto" style="text-transform:uppercase;">
                    </div>					
					<br>
                    <div class="form-group">
                        <label>Clasificación</label>
							<select class="form-control"id="clasif_prod" name="clasif_prod">
								<option value="Nuevo">Nuevo</option>
								<option value="Establecido">Establecido</option>
							</select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <input type="reset" class="btn btn-default" value="Limpiar">
                </form>
            </div>
        </div>
    </body>
</html>

