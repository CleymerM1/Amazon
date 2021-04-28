<?php
header("Content-Type: application/json");
include_once("../class/class-producto.php");

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'),true);
        
    break;
    case "GET":
       if(isset($_GET["idCategoriaVenta"])){
           echo json_encode(Producto::obtenerMasVendido($_GET["idCategoriaVenta"]));
       }elseif(isset($_GET["nombreVentaCategoria"])){
           $idVentaCategoria = Producto::obtenerIdVentaCategoria($_GET["nombreVentaCategoria"]);
            echo json_encode(Producto::obtenerMasVendido($idVentaCategoria));
       }elseif(isset($_GET["idProducto"])){
           echo json_encode(Producto::obtenerProducto($_GET["idProducto"]));
       }elseif(isset($_GET["idCategoria"])){
           echo json_encode(Producto::obtenerProductosPorCategoria($_GET["idCategoria"]));
       }
    break;
    case "PUT":

        $_PUT = json_decode(file_get_contents('php://input'),true);
       

    break;
    case "DELETE":
       

    break;
}
?>