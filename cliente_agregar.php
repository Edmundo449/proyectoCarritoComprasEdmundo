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
                <h1>Registrar un cliente nuevo</h1>
                <form role="form" id="login-form" 
                      method="post" class="form-signin" 
                      action="cliente_guardar.php">
                    
                    <div class="h2">
                        DATOS DEL CLIENTE
                    </div>
                    <div class="form-group">
                        <label>Nombre del Cliente</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               placeholder="Ingresa nombre del cliente" style="text-transform:uppercase;" required>
                    </div>
                    <div class="form-group">
					
					
					<label>Sexo</label>
						<select class="form-control" id="sexo" name="sexo">
							<option value="HOMBRE">HOMBRE</option>
							<option value="MUJER">MUJER</option>
						</select>
                    </div>

                    <div class="form-group">
                        <label>Tel&eacute;fono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono"
                               placeholder="Ingresa primer tel&eacute;fono" style="text-transform:uppercase;">
                    </div>

                    <label>Celular</label>
                    <input type="tel" class="form-control" id="celular" name="celular"
                           placeholder="Ingresa segundo tel&eacute;fono" style="text-transform:uppercase;">
                    <br>
                    <div class="form-group">
                        <label for="correo_proveedor">Correo electr&oacute;nico</label>

                        <input type="email" class="form-control" id="correo" name="correo"
                               placeholder="Ingresa correo electr&oacute;nico" style="text-transform:uppercase;">

                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <input type="reset" class="btn btn-default" value="Limpiar">
                </form>
            </div>
        </div>
    </body>
</html>

