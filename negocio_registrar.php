<!DOCTYPE html>
<html>
    <head>
        <title>Agregar Negocio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--código que incluye Bootstrap-->
        <?php include'inc/incluye_bootstrap.php' ?>
        <!--termina código que incluye Bootstrap-->
    </head>
    <body>
        <!--código que incluye el menú responsivo-->
        <?php
        include'inc/incluye_menu.php';
        include 'inc/conexion.php';
        ?>
        <!--termina código que incluye el menú responsivo-->
		<div class="container" style="background-image: url(img/01.jpg);">
            <div class="jumbotron" style="background-image: url(img/00.jpg);">
                <?php
                $sel = $con->prepare("SELECT cliente_id, cliente_nombre from clientesFrecuentes");
                $sel->execute();
                $res = $sel->get_result();
                ?>
                <h1>Registrar un Negocio</h1>
                <form role="form" id="login-form" 
                      method="post" class="form-signin" 
                      action="negocio_guardar.php">
                    <div class="h2">
                        DATOS DEL NEGOCIO
                    </div>
                    <div class="form-group">
                        <label for="nombre_cliente">Selecciona un Cliente Frecuente</label>
                        <br>
                        <select class="selectpicker" name="id_cliente">
                            <?php while ($f = $res->fetch_assoc()) { ?>
                                <option value="<?php echo $f['cliente_id'] ?>"><?php echo $f['cliente_nombre'] ?>
                                </option>
                                <?php
                            }
                            $sel->close();
                            $con->close();
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nombre_negocio">Nombre del Negocio</label>
                        <input type="text" class="form-control" id="nombre_negocio" name="nombre_negocio"
                               placeholder="Ingresa el nombre del Negocio" style="text-transform:uppercase;" required>
                    </div>
                    <div class="form-group">
                        <label>Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="direccion_negocio" name="direccion_negocio"
                               placeholder="Ingresa direcci&oacute;n del Negocio" style="text-transform:uppercase;">
                    </div>

                    <div class="form-group">
                        <label>Tel&eacute;fono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono"
                               placeholder="Ingresa el tel&eacute;fono" style="text-transform:uppercase;">
                    </div>

                    <label>Celular</label>
                    <input type="tel" class="form-control" id="celular" name="celular"
                           placeholder="Ingresa el celular" style="text-transform:uppercase;">
                    <br>
                    <div class="form-group">
                        <label for="correo_sucursal">Correo electr&oacute;nico</label>

                        <input type="email" class="form-control" id="correo_negocio" name="correo_negocio"
                               placeholder="Ingresa el correo electr&oacute;nico" style="text-transform:uppercase;">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <input type="reset" class="btn btn-default" value="Limpiar">
                </form>
            </div>
        </div>

    </body>
</html>