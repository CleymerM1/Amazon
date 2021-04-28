<?php
header("Content-Type: application/json");
include_once("../class/class-empresa.php");

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'),true);
    break;
    case "GET":
        if(isset($_GET["idEmpresa"])){
            echo json_encode(Empresa::obtenerEmpresa($_GET["idEmpresa"]));
        }else{
            //echo json_encode(Empresa::obtenerEmpresas());
        }
       
    break;
    case "PUT":

        $_PUT = json_decode(file_get_contents('php://input'),true);

    break;
    case "DELETE":
        
    break;
}
?>