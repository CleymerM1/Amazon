<?php
    session_start();
    if(!isset($_SESSION["token"])){
      header("Location: ../index.html");
    }
    if(!isset($_COOKIE["token"])){
      header("Location: ../index.html");
    }
    if($_SESSION["token"] != $_COOKIE["token"]){
      header("Location: ../index.html");
  
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/all.css">

    <title>Amazon: Compras en Línea de Electrónicos, Ropa, Computadoras</title>
</head>
<style>a{
  text-decoration: none;
}
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark primer-nav">
      <div class="container-fluid mt-3">
        <a class="navbar-brand" href="#">
          <img class="logo-principal" src="../img/amazon_principal.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
              <!-- Button de Envios -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEnvio">
                  <i class="fas fa-map-marker-alt" id="btn-envios" style="background-color:  #212529;" >Enviar a Honduras</i>
                </button>    
              </a>
            </li>
            <li class="nav-item input-categories mt-1">
              <div class=" col-4 input-group mb-6 ">
                <select class="custom-select my-1 mr-sm-2" id="select-departamento">
                  <option selected>Todos los departamentos</option>
                  <option value="1">Arte y Artesanías</option>
                  <option value="2">Automotriz</option>
                  <option value="3">Bebé</option>
                  <option value="4">Belleza y Cuidado Personal</option>
                  <option value="5">Computadoras</option>
                  <option value="6">Electrónicos</option>
                  <option value="7">Libros</option>
                  <option value="8">Musica MP3</option>
                  <option value="9">Prime Video</option>
                  <option value="10">Tienda Kindle</option>
                  <option value="11">Moda para Mujer</option>
                  <option value="12">Moda para Hombres</option>
                  <option value="13">Moda para niñas</option>
                  <option value="14">Moda para niños</option>
                  <option value="15">Cine y TV</option>
                  <option value="16">Deportes y actividades al aire libre</option>
                  <option value="17">Equipaje</option>
                  <option value="18">Herramientas y mejoramiento del hogar</option>
                  <option value="19">Hogar y Cocina</option>
                </select>

                <input type="text" class="form-control input-categories" aria-label="Text input with dropdown button">
                <button class="btn btn-outline-secondary btn-nav-search" type="button"  aria-expanded="false">
                <i class="fas fa-search"></i>
                </button>
            </div>  
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="../img/united-states.png" class="img-usa" alt="" srcset="">
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                  </ul>
              </li>
              
              <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                
              <li class="nav-item">
                  <div class="dropdown">
                    <button class="btn btn-primary my-2 my-sm-0 btn-identificate" type="submit">
                      <span>&nbsp;&nbsp;<a class="link-identificate" href="Identificate.html"><span id="nombre-usuario">Hola,Identificate</span><br>Cuenta y Lista</a></span>
                     
                    </button>
                              
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">item 1</a></li>
                              </ul>
                          
                  </div>
              </li>
              <li class="nav-item">
                  <div class="devoluciones-pedidos">
                    <a class="nav-link dropdown-toggle txt-cuenta-lista" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Devoluciones <br>
                      y pedidos 
                    </a>
                  </div>
              </li>
              <li class="nav-item ">
                <div class="boton-Carrito  mb-3">
                  
                <a class="nav-link " href="#" id="navbar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../img/carrito.jpg" class="img-shop" alt="" srcset="">
                    <br>
                    <button id="btn-carrito" class="btn-carrito" >Carrito</i></button>
                </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
        <!-- Segundo nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark segundo-nav "id="todo">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            
            <span><i class="fas fa-bars boton-burger" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></span>
            <span style="color: white; font-size: 14px; font-weight: bold;">Todo</span>
          </li>
          <li class="nav-item item-nav-dos">
            <span>
              <a href="#"><b>Ofertas del Día</b></a>
            </span>
          </li>
          <li class="nav-item item-nav-dos">
            <span>
              <a href="#"><b>Servicio al Cliente</b></a>
            </span>
          </li>
          <li class="nav-item item-nav-dos">
            <span>
              <a href="#"><b>Tarjetas de Regalo</b></a>
            </span>
          </li>
          <li class="nav-item item-nav-dos">
            <span>
              <a href="#"><b>Vender</b></a>
            </span>
          </li>
          <li class="nav-item item-nav-dos">
            <span>
              <a href="#"><b>Listas</b></a>
            </span>
          </li>
          

          <li class="nav-item item-nav-dos click-here">

          </li>
        </ul>
      
        <span class="nav-item item-nav-dos">
          <a  href="logout.php"><b>Cerrar sesión</b></a>
        </span>
      </div>
    </nav>
  <main id="main-compras" class="main-compras">
      
        <div class="row" id="tarjetas-compras">
            <!--Tarjetas principales-->
            

        </div>
        <div class="row" id="mas-vendidos">
          <div class="col-12 my-2">
            <div style="background-color: white;">
              <h2 class="titulo-scroll">Nuestros jugeutes favoritos</h2>
                <ul class="gallery my-2">
                  
                </ul>
            </div>
          </div>
            <!--Item 2-->
        </div>

        <div class="row">
            <div class="col-12">
                <input type="button" value="Iniciar sesión para obtener recomendaciones personalizadas" class="btn-inicio-foot mb-5" >
            </div>
        </div>
     
  </main>

  <main id="productos-categoria">
    <div class="container">

      <div class="row" id="contenedor-productos">
        
      </div>
    </div>
  </main>
  <main id="productos-detalle">
    <div class="container">
      <div class="row" id="contenedor-detalle">
        <div class="col-12">
          <div class="row">
            <div class="col-4">
              <img class="img-detalle-producto" src="../img/productos/hp_1.jpg" alt="">
            </div>
            <div class="col-5">
              <div class="row">
                <div class="col-12">
                  <h4>Titulo del producto</h4>
                  <span class="marca-detalle">Marca: Marca del producto</span>
                  <hr>
                </div>
                <div class="col-12">
                  <span>Precio: <span>L.500.00</span> <span>+ L. 77.0 de envio y deposito de derechos de importación</span></span>
                  <h6>Descripción</h6>
                  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus distinctio, eos nobis atque veniam numquam tempora autem impedit itaque. Harum cumque asperiores quaerat aspernatur iste quisquam unde, ex sed sequi nam consequatur saepe ab assumenda perferendis maxime cum cupiditate.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quod aperiam modi officia? Quidem corrupti eos nulla rerum eaque fugit doloremque tempore repellendus provident esse sit asperiores incidunt ea, dignissimos molestiae commodi et suscipit distinctio vero. Voluptatibus totam repellendus corrupti aperiam vel reiciendis nihil reprehenderit obcaecati alias, temporibus ipsa placeat esse neque porro possimus dolores asperiores sapiente error illum sit eum quisquam! Illum.

                  </p>
                </div>
              </div>
            </div>
            <div class="col-3 border border-light my-4">
              <div class="row">
                <div class="col-12 my-4">
                  <span class="spn-precio">L.500.00</span>
                </div>
                <div class="col-12 my-4">
                  <label for="cantidad">Cantidad</label>
                  <select name="cantidad" id="cantidad-producto" >

                  </select>
                </div>
                <div class="col-12 my-4">
                  <button class="btn-add-car"><span><img src="../img/carrito.jpg" alt=""></span>Agregar al carrito</button>
                </div>
                <div class="col-12 my-4">
                  <button class="btn-add-list"><span></span>Agregar a la lista</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!--Modal de menu desplegable-->

<!-- Modal -->

<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-menu-izquierdo">
    <div class="modal-content contenido-modal-menu-izquierdo">
      <div class="modal-header encabezado-modal-menu-izquierdo ">
          <i class="fas fa-user-circle user-modal"></i>
          <a href="Identificate.html"><h4 class="modal-title titulo-modal-menu-izquierdo" id="exampleModalLabel" >Hola, identifícate</h4></a>
          <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="col-2">
      </div>
    </div>
    <div class="modal-body">
      <!--Cuerpo del modal-->
      
      <div class="titulo-item-modal-menu-izquierdo">Contenido y dispositivos digitales</div>

      <!--Item 1-->
      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Amazon Music</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>

      <!--Item 2-->
      
      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">E-readers Kindle y Libros</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>

      <!--Item 3-->
      
      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Appstore para Android</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>
      <hr>


      <div class="titulo-item-modal-menu-izquierdo">Buscar Por Departamento</div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Electrónicos</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>

      
      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Computadoras</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Smart Home</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Arte y Artesanías</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>
      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Ver Más</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-down mt-3 mb-3"></i>
          </div>
        </div>
      </div>


      <hr>
      <div class="titulo-item-modal-menu-izquierdo">Programas y Caracteristicas</div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Tarjetas de Regalo</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>

      
      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">#FoundItOnAmazon</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Amazon Live</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Tienda Internacional</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Ver Todo</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-down mt-3 mb-3"></i>
          </div>
        </div>
      </div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Mapa de Tiendas</h6>
          </div>
          <div class="col-2">
            <i class="fas fa-chevron-right mt-3 mb-3"></i>
          </div>
        </div>
      </div>
      <hr>
      <div class="titulo-item-modal-menu-izquierdo">Ayuda y Configuración</div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Tu Cuenta</h6>
          </div>
          <div class="col-2">
          </div>
        </div>
      </div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Español</h6>
          </div>
          <div class="col-2">
          </div>
        </div>
      </div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Estados Unidos</h6>
          </div>
          <div class="col-2">
            
          </div>
        </div>
      </div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Ayuda</h6>
          </div>
          <div class="col-2">
          </div>
        </div>
      </div>

      <div class="item-interno mb-1">
        <div class="row">
          <div class="col-10 ">
            <h6 class="txt-item-modal-menu-izquierdo mt-3 mb-3">Identificate</h6>
          </div>
          <div class="col-2">
          </div>
        </div>
      </div>
      
      
    </div>
  

    <div class="modal-footer"> </div>
    </div>
  </div>
</div>
<!-- Modal para envios -->
<div class="modal fade" id="ModalEnvio" tabindex="-1" aria-labelledby="ModalEnvioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modal-content-envio">
      <div class="modal-header"style="background-color:#D5D9D9">
        <h4 class="modal-title titulo-ubicacion"  id="ModalEnvioLabel">Elige tu ubicación</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12"><h5 id="modal-Envios">Las opciones y velocidades de envío pueden variar según la dirección</h5></div>
            <br><br>
            <div class="col-12">
              <button id="boton-envio">Inicia Sesión para ver tus direcciones</button><br><br>
            </div>
            <div class="col-12">
              <h5 id="modal-Envios">o introduce un codigo postal en EE.UU</h5>
            </div><br>

            <div class="col-8">
              <input class="" type="text" id="codigo-postal">
            </div>
            <div class="col-4">
              <button type="button" class=" btn-aplicar">Aplicar</button>
            </div>
            <br><br>
            <div class="col-5"><hr></div>
            <div class="col-1 "><h5 id="modal-Envios">o</h5></div>
            <div class="col-5"><hr></div>
            <select class="form-control " id="lista-paises">
              <option value="Honduras">Honduras</option>
              <option value="El Salvador">El Salvador</option>
              <option value="Guatemala">Guatemala</option>
              <option value="Costa Rica">Costa Rica</option>
            </select><br>
          </div>
        </div>         
      </div>
    <div class="modal-footer">
      <button type="button" id="btn-listo" class="btn-listo btn-primary-listo">Listo</button>
    </div>
  </div>
</div>
</div>
    
      
     
  <!--Footer-->
    <footer id="footer-titulos" class="footer pie-pagina pt-5 ">
          
      <div class="container">
          <a href="index.html" id="btn-footer"><b id="btn-footer">Inicio de Página</b></a>
            <hr>
              <div class="row">
                

          <div class="col-12 col-md-6 col-lg-2 col-xl-2 pl-0 pt-4">
            
            <table>
              <tr>
                <td><h4 id="titulos"class="pl-5 txt-encabezado-lista"><b>Conócenos</b></h4></td>
              </tr>
              <tr>
                <td><a id="footer-titulos"class="links-footer pl-5" href="">Trabaja en Amazon</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Blog</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Acerca de Amazon</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Relaciones con los inversionistas</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Dispositivos amazon</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Amazon Tours</a></td>
              </tr>
            </table>
          </div>
          <div class="col-12 col-md-6 col-lg-3 col-xl-3 pl-0 pt-4">
            <table>
              <tr>
                <td> <h4 id="titulos"class="pl-4 txt-encabezado-lista"><b>Gana Dinero con Nosotros</b></h4></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Vender Productos en Amazon</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Vende en Amazon Business</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Vender Aplicaciones en Amazon</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Programa de Afiliados</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Anuncia tus productos</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Publica tu Libro en Kindle</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Habilita un Amazon Hub</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Ver más Gana Dinero con Nosotros</a></td>
              </tr>
            </table>
          </div>
          <div class="col-12 col-md-6 col-lg-3 col-xl-3 pl-0 pt-4">
            <table>
              <tr><td>
                <h4 id="titulos" class="pl-5 txt-encabezado-lista"><b>Productos de Pago de Amazon</b></h4>
              </td></tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Compra con Puntos</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Recarga tu Saldo</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Convertir tu moneda de Amazon</a></td>
              </tr>
            </table>
          </div>
          <div class="col-12 col-md-6 col-lg-3 col-xl-2 pl-0 pt-4">
            <table>
              <tr>
                <td><h4 id="titulos" class="pl-5 txt-encabezado-lista"><b>Podemos Ayudarte</b></h4></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Amazon y el Covid-19</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Tu Cuenta</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Tus Pedidos</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Tarifas de Envíos y Políticas</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Devoluciones y Reemplazos</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Administrar Contenido y Dispositivos</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Amazon Assistent</a></td>
              </tr>
              <tr>
                <td><a id="footer-titulos" class="links-footer pl-5" href="">Ayuda</a></td>
              </tr>
    
            </table>
          </div>
          <hr>


          <div class="col-3">
            <table>
              <tr>
                <td><img class="logo-principal" src="../img/amazon_principal.png" alt=""></td>
              </tr>
            </table>
          </div>
          <div class="col-3 ">
            <table>
              <tr>
                <td><div class=" col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                  <select class="custom-select my-1 mr-sm-2" id="select-idioma">
                    <i class="fas fa-globe"></i>
                    <option selected>Cambiar idioma</option>
                    <option value="1">English EN</option>
                    <option value="2">Español Es</option>
                    <option value="3">简体中文 - ZH</option>
                    <option value="4">Deutsch - DE</option>
                    <option value="5">Português - PT</option>
                    <option value="6">繁體中文 - ZH</option>
                    <option value="7">한국어 - KO</option>
                    <option value="8">עברית - HE</option>
                  </select>
                </div>
              </td>
                
              </tr>
            </table>
          </div>
          <div class="col-3 ">
            <table>
              <tr>
                <td>
                  <a href="index.html">
                  <input  type="button" value="$ USD-dólar estadounidense" id="btn-dolar">
                </a>
                
              </td>
                
              </tr>
            </table>

          </div>

        </div>
        
        
    </footer>
  </main> 



    
    

    <script src="https://kit.fontawesome.com/0ada90212e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../js/controladorcompras.js"></script>
    <script src="../js/controlador.js"></script>
</body>
</html>