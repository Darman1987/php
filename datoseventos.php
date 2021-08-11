<?php
header('Content-Type: application/json');

require("conexion.php");

$pdo = retornarConexion();

switch ($_GET['accion']) {
    case 'listar':
        $sql = $pdo->prepare("select codigo as id,
                                     titulo as title,
                                     descripcion,
                                     inicio as start,
                                     fin as end,
                                     colortexto as textColor,
                                     colorfondo as backgroundColor 
                                from eventos");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
        break;

    case 'agregar':
        $sql = $pdo->prepare("insert into eventos(titulo,descripcion,inicio,fin,colortexto,colorfondo) values 
                              (:titulo,:descripcion,:inicio,:fin,:colortexto,:colorfondo)
        ");
        $resultado = $sql->execute(array(
            "titulo" => $_POST['titulo'],
            "descripcion" => $_POST['descripcion'],
            "inicio" => $_POST['inicio'],
            "fin" => $_POST['fin'],
            "colortexto" => $_POST['colortexto'],
            "colorfondo" => $_POST['colorfondo'],
        ));
        echo json_encode($resultado);
        break;

    case 'modificar':
        $sql = $pdo->prepare("update eventos set titulo=:titulo,
                                                     descripcion=:descripcion,
                                                     inicio=:inicio,
                                                     fin=:fin,
                                                     colortexto=:colortexto,
                                                     colorfondo=:colorfondo
                                                 where codigo=:codigo");
        $resultado = $sql->execute(array(
            "titulo" => $_POST['titulo'],
            "descripcion" => $_POST['descripcion'],
            "inicio" => $_POST['inicio'],
            "fin" => $_POST['fin'],
            "colortexto" => $_POST['colortexto'],
            "colorfondo" => $_POST['colorfondo'],
            "codigo" => $_POST['codigo']
        ));
        echo json_encode($resultado);
        break;

    case 'borrar':
        $sql = $pdo->prepare("delete from eventos where codigo=:codigo");
        $resultado = $sql->execute(array(
            "codigo" => $_POST['codigo']
        ));
        echo json_encode($resultado);
        break;
}