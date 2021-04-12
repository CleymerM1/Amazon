<?php
header("Content-Type: application/json");
include_once("../class/class-usuario.php");

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'),true);
        $usuario = new Usuario($_POST["idUsuario"], $_POST["nombre"], $_POST["apellido"], $_POST["nombreUsuario"], $_POST["correoE"], $_POST["contrasena"],$_POST["ordenes"]);
        echo $usuario->guardarUsuario();

    break;
    case "GET":
       if (isset($_GET['idUsuario'])){
            echo json_encode(Usuario::obtenerUsuarioPorId($_GET['idUsuario']));
        }elseif (isset($_GET['correoE'])) {
            echo json_encode(Usuario::obtenerUsuarioPorCorreo($_GET['correoE']));
        }else{
            echo json_encode(Usuario::obtenerUsuarios());
        }
    break;
    case "PUT":

        $_PUT = json_decode(file_get_contents('php://input'),true);
        $usuario = new Usuario($_PUT["idUsuario"], $_PUT["nombre"], $_PUT["apellido"], $_PUT["nombreUsuario"], $_PUT["correoE"], $_PUT["contrasena"],$_PUT["ordenes"]);
        $usuario->actualizarUsuario($_GET['idUsuario']);

    break;
    case "DELETE":
        Usuario::eliminarUsuario($_GET['idUsuario']); 

    break;
}
?>