<?php
header('Content-Type: application/json');

require("conexion.php");

$pdo = retornarConexion();

switch ($_GET['accion']) {
    case 'listar':
        $sql = $pdo->prepare("select codigo,descripcion,precio from articulos");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
        break;

    case 'agregar':
        $sql = $pdo->prepare("insert into articulos(descripcion,precio) values (:descripcion,:precio)");
        $resultado = $sql->execute(array(
            "descripcion" => $_POST['descripcion'],
            "precio" => $_POST['precio']
        ));
        echo json_encode($resultado);
        break;

    case 'borrar':
        $sql = $pdo->prepare("delete from articulos where codigo=:codigo");
        $resultado = $sql->execute(array(
            "codigo" => $_GET['codigo']
        ));
        echo json_encode($resultado);
        break;

    case 'consultar':
        $sql = $pdo->prepare("select codigo,descripcion,precio from articulos where codigo=:codigo");
        $sql->execute(array("codigo" => $_GET['codigo']));
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
        break;

    case 'modificar':
        $sql = $pdo->prepare("update articulos set
                                  descripcion=:descripcion,
                                  precio=:precio
                                where codigo=:codigo");
        $resultado = $sql->execute(array(
            "descripcion" => $_POST['descripcion'],
            "precio" => $_POST['precio'],
            "codigo" => $_GET['codigo']
        ));
        echo json_encode($resultado);
        break;
}
?>