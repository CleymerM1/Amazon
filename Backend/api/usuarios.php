<?php
header("Content-Type: application/json");
include_once("../class/class-usuario.php");

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'),true);
        $usuario = new Usuario($_POST["nombre"], $_POST["correo"], $_POST["contrasenia"],$_POST["ordenes"], $_POST["carrito"]);
        echo json_encode($usuario->guardarUsuario());

    break;
    case "GET":
        if(isset($_GET["idUsuario"])){
            echo json_encode(Usuario::obtenerUsuario($_GET["idUsuario"]));
        }

    break;
    case "PUT":

        $_PUT = json_decode(file_get_contents('php://input'),true);


    break;
    case "DELETE":

    break;
}
?>