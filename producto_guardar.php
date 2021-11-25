<?php
include 'inc/conexion.php';
$refaccion_id = "";
$marca_id_post = $_POST['marca_id'];
$nombre_producto_post = strtoupper($_POST['nombre_de_producto']);
$descripcion_producto_post = strtoupper($_POST['descripcion_de_producto']);
$producto_imagen="sin imagen";

$sel = $con->prepare("SELECT productos_id,marca_id,productos_nombre FROM productos where marca_id=? AND productos_nombre=?");
$sel->bind_param('is', $marca_id_post, $nombre_producto_post);
$sel->execute();
$res = $sel->get_result();
$row = mysqli_num_rows($res);

if ($row != 0) {
    echo "YA EXISTE EL PRODUCTO " . $nombre_producto_post . " PARA LA MARCA SELECCIONADA";
    echo "¿Deseas agregarle un nuevo precio de proveedor?";
    echo "<a href=\"refacciones_proveedores.php?productos_id=" . $productos_id . "&productos_nombre=" . $nombre_producto_post . "\" class=\"btn btn-primary\" role=\"button\"> AGREGAR </a>";
    echo "<a href=\"producto_seleccionar_marca.php\" class=\"btn btn-default\" role=\"button\"> CANCELAR </a>";
} else {
	$ins = $con->prepare("INSERT INTO productos VALUES(?,?,?,?,?)");
	    $ins->bind_param("iisss", $id, $marca_id_post, $nombre_producto_post, $descripcion_producto_post, $producto_imagen);
    if ($ins->execute()) {
//SUBIR LA IMAGEN
        $ultimo_id = "noWhile";
        $extension = '';
        $ruta = 'imagenes_productos';
        $archivo = $_FILES['foto']['tmp_name']; //foto es el name del input en el formulario
        $nombrearchivo = $_FILES['foto']['name'];
        $info = pathinfo($nombrearchivo);
        if ($archivo != '') {
            $extension = $info['extension'];
            if ($extension == "png" || $extension == "PNG" || $extension == "JPG" || $extension == "jpg") {
                //CONSULTAMOS EL ID DEL ULTIMO REGISTRO SUBIDO
                $sel = $con->prepare("SELECT MAX(productos_id)as ultimo_producto FROM productos;");
                $sel->execute();
                $res = $sel->get_result();
                while ($f = $res->fetch_assoc())
                    $ultimo_id = $f['ultimo_producto'];

                //FIN //CONSULTAMOS EL ID DEL ULTIMO REGISTRO SUBIDO
                //SUBIMOS LA IMAGEN CAMBIANDO SU NOMBRE POR EL DEL ULTIMO ID
                move_uploaded_file($archivo, 'imagenes_productos/' . $ultimo_id . '.' . $extension);
                $ruta = $ruta . "/" . $ultimo_id . '.' . $extension;
                //FIN SUBIMOS LA IMAGEN CAMBIANDO SU NOMBRE POR EL DEL ULTIMO ID
                //ACTUALIZAMOS EL CAMPO QUE CONTIENE EL NOMBRE DE LA IMAGEN EN LA BD
                $sel = $con->prepare("UPDATE productos SET productos_imagen='" . $ruta . "' WHERE productos_id=?;");
                $sel->bind_param('i', $ultimo_id);
                $sel->execute();
                //FIN ACTUALIZAMOS EL CAMPO QUE CONTIENE EL NOMBRE DE LA IMAGEN EN LA BD
                header("Location: alerta.php?tipo=exito&operacion=Producto guardado, imagen almacenada&destino=producto_seleccionar_marca.php?");
            } else {
                header("Location: alerta.php?tipo=fracaso&operacion=Formato de imagen no valido, utiliza jpg o png &destino=producto_seleccionar_marca.php");
            }
        } else {

            header("Location: alerta.php?tipo=exito&operacion=Producto guardadp, no se selecciono imagen&destino=producto_seleccionar_marca.php?");
        }
    } else {
        header("Location: alerta.php?tipo=fracaso&operacion=No se pudo registrar producto&destino=producto_seleccionar_marca.php");
    }
    $ins->close();
    $con->close();
}
?>
