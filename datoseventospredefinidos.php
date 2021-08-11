<?php
header('Content-Type: application/json');

require("conexion.php");

$pdo = retornarConexion();

switch ($_GET['accion']) {
    case 'listar':
        $sql = $pdo->prepare("select codigo,titulo,horainicio,horafin,colortexto,colorfondo from eventospredefinidos");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
        break;

    case 'agregar':
        $sql = $pdo->prepare("insert into eventospredefinidos(titulo,horainicio,horafin,colortexto,colorfondo) values 
                                          (:titulo,:horainicio,:horafin,:colortexto,:colorfondo)");
        $resultado = $sql->execute(array(
            "titulo" => $_POST['titulo'],
            "horainicio" => $_POST['horainicio'],
            "horafin" => $_POST['horafin'],
            "colortexto" => $_POST['colortexto'],
            "colorfondo" => $_POST['colorfondo']
        ));
        echo json_encode($resultado);
        break;

    case 'borrar':
        $sql = $pdo->prepare("delete from eventospredefinidos where codigo=:codigo");
        $resultado = $sql->execute(array(
            "codigo" => $_POST['codigo']
        ));
        echo json_encode($resultado);
        break;

}