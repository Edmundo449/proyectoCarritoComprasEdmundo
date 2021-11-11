<?php
include 'inc/conexion.php';
$refaccion_id = "";
$marca_id_post = $_POST['marca_id'];
$nombre_producto_post = strtoupper($_POST['nombre_de_producto']);
$descripcion_producto_post = strtoupper($_POST['descripcion_de_producto']);
$refaccion_imagen="sin imagen";

$sel = $con->prepare("SELECT productos_id,marca_id,productos_nombre FROM productos where marca_id=? AND productos_nombre=?");
$sel->bind_param('is', $marca_id_post, $nombre_producto_post);
$sel->execute();
$res = $sel->get_result();
$row = mysqli_num_rows($res);

if ($row != 0) {
    echo "YA EXISTE EL PRODUCTO " . $nombre_producto_post . " PARA LA MARCA SELECCIONADA";
    echo "¿Deseas agregarle un nuevo precio de proveedor?";
    echo "<a href=\"refacciones_proveedores.php?refaccion_id=" . $refaccion_id . "&productos_nombre=" . $nombre_producto_post . "\" class=\"btn btn-primary\" role=\"button\"> AGREGAR </a>";
    echo "<a href=\"index_refacciones.php\" class=\"btn btn-default\" role=\"button\"> CANCELAR </a>";
} else {
    $ins = $con->prepare("INSERT INTO productos VALUES(?,?,?,?,?)");
    $ins->bind_param("iisss", $id, $marca_id_post, $nombre_producto_post, $descripcion_producto_post, $refaccion_imagen);
    if ($ins->execute()) {
        echo "Producto guardado <br> Ahora debes agregarle un precio de proveedor (si no lo haces puedes provocar p&eacute;rdida de informaci&oacute;n) --";
        echo "Registrado Producto";
    } else {
        echo "Error al insertar Producto";
    }
    $ins->close();
    $con->close();
}
?>
