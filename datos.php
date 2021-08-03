<?php
header('Content-Type: application/json');

require("conexion.php");

$conexion = retornarConexion();

switch ($_GET['accion']) {
    case 'listar':
        $datos = mysqli_query($conexion, "select codigo,descripcion,precio from articulos");
        $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;

    case 'agregar':
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
        $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
        $respuesta = mysqli_query($conexion, "insert into articulos(descripcion,precio)
                                                values ('$descripcion',$precio)");
        echo json_encode($respuesta);
        break;

    case 'borrar':
        $codigo = mysqli_real_escape_string($conexion, $_GET['codigo']);
        $respuesta = mysqli_query($conexion, "delete from articulos
                                                where codigo=$codigo");
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $codigo = mysqli_real_escape_string($conexion, $_GET['codigo']);
        $datos = mysqli_query($conexion, "select codigo,descripcion,precio 
                                            from articulos where codigo=$codigo");
        $resultado = mysqli_fetch_all($datos, MYSQLI_ASSOC);
        echo json_encode($resultado);
        break;

    case 'modificar':
        $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
        $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
        $codigo = mysqli_real_escape_string($conexion, $_GET['codigo']);
        $respuesta = mysqli_query($conexion, "update articulos set
                                                  descripcion='$descripcion',
                                                  precio=$precio
                                               where codigo=$codigo");
        echo json_encode($respuesta);
        break;
}
?>