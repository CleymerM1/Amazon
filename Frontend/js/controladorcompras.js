this.usuarioSeleccionado = null;
var idUsuario = readCookie("idUsuario");
var inicioSesion = false;
if(idUsuario){
    this.inicioSesion = true;
    
}else{
    console.log("No");
}

function readCookie(nombre) {

    var nombreEQ = nombre + "="; 
    var ca = document.cookie.split(';');
  
    for(var i=0;i < ca.length;i++) {
  
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nombreEQ) == 0) {
        return decodeURIComponent( c.substring(nombreEQ.length,c.length) );
      }
  
    }
  
    return null;
  
  }

const slider = document.querySelector('.gallery');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', e => {
  isDown = true;
  slider.classList.add('active');
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', _ => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mouseup', _ => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mousemove', e => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const SCROLL_SPEED = 3;
  const walk = (x - startX) * SCROLL_SPEED;
  slider.scrollLeft = scrollLeft - walk;
});



const categorias = ["Electronica", "Ropa", "Bebés", "Videojuegos", "Belleza"];
const costoEnvio = 77.0;
var productoSeleccionado = null;

function mostrarMaincompras(value = true){
  let estilo = value ? "block" : "none";
  document.getElementById("main-compras").style.display = estilo;
}
function mostrarProductosCategoria(value = true){
  let estilo = value ? "block" : "none";
  document.getElementById("productos-categoria").style.display = estilo;
}
function mostrarProductosDetalle(value = true){
  let estilo = value ? "block" : "none";
  document.getElementById("productos-detalle").style.display = estilo;
}

function reenderizarTarjetasCategorias(){  
  url = `../../backend/api/categorias.php`;
  axios({
    method: 'GET',
    url: url,
    responseType: 'json'
  }).then(res=>{
    document.getElementById("tarjetas-compras").innerHTML = "";
    let contador = 0;
    res.data.forEach(categoria => {
        if(contador == 3 && !inicioSesion){
          document.getElementById("tarjetas-compras").innerHTML += `
          <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-12">
            <div class="card card-compras">
                <div onclick="reenderizarCategoria(${categoria.idCategoria});" class="card-body">
                    <h4 class="card-title titulo-item">Inicia sesión para vivir tu mejor experiencia</h4>
                    <input type="button" value="Iniciar sesión de forma segura" class="btn-inicio-card" >
                </div>
            </div>
          </div>      
          `;
        }
        document.getElementById("tarjetas-compras").innerHTML += `
          <div class="col-sm-12  col-md-6 col-lg-3 col-xl-3 col-12">
                <div class="card card-compras">
                    <div onclick="reenderizarCategoria(${categoria.idCategoria});" class="card-body">
                        <h4 class="card-title titulo-item">${categoria.nombreCategoria}</h4>
                        <img class="img-card mt-3" src="../${categoria.imagen}" alt="">
                    </div>
                    <a class="footer-card" href="#">ver mas</a>
                </div>
          </div>       
        `;
        contador++;
      });
      
  }).catch(error=>{ 
      console.error(error);
  });
}

function actualizarPrecioDetalle(precioBase){
  cantidad = document.getElementById("cantidad-detalle").value;
  document.getElementById("precio-detalle").innerHTML = `<span class="spn-precio">L.${(precioBase * cantidad) + costoEnvio}</span>`;
}

function agregarAlCarrito(idProducto){
  if(inicioSesion){
    console.log(productoSeleccionado);
  }
}

function reenderizarDetalleProducto(idProducto){
  obtenerProducto(idProducto).then(res => {
    mostrarMaincompras(false);
    mostrarProductosCategoria(false);
    mostrarProductosDetalle(true);
    let producto = res.data;
    productoSeleccionado = producto;
    obtenerEmpresa(producto.idEmpresa).then(emp => {
      document.getElementById("productos-detalle").innerHTML = `
    <div class="container">
      <div class="row" id="contenedor-detalle">
        <div class="col-12">
          <div class="row">
            <div class="col-4">
              <img class="img-detalle-producto" src="../${producto.imagen}" alt="">
            </div>
            <div class="col-5">
              <div class="row">
                <div class="col-12">
                  <h4>${producto.nombreProducto}</h4>
                  <span class="marca-detalle">Marca: ${emp.data.nombreEmpresa}</span>
                  <hr>
                </div>
                <div class="col-12">
                  <span>Precio: <span>L.${producto.precio}</span> <span>+ L. ${costoEnvio} de envio y deposito de derechos de importación</span></span>
                  <h6>Descripción</h6>
                  <p>
                  ${producto.descripcion}
                  </p>
                </div>
              </div>
            </div>
            <div class="col-3 border border-light my-4">
              <div class="row">
              <div class="col-12 my-4">
                <label for="cantidad">Cantidad</label>
                <select name="cantidad" id="cantidad-detalle" onchange="actualizarPrecioDetalle(${producto.precio});">
                  <option  value="1">1</option>
                  <option  value="2">2</option>
                  <option  value="3">3</option>
                  <option  value="4">4</option>
                  <option  value="5">5</option>
                  <option  value="6">6</option>
                  <option  value="7">7</option>
                  <option  value="8">8</option>
                  <option  value="9">9</option>
                  <option  value="10">10</option>
                  <option  value="11">11</option>
                </select>
              </div>
                <div class="col-12 my-4" id="precio-detalle">
                  <span class="spn-precio">L.${producto.precio}</span>
                </div>
                <div class="col-12 my-4">
                  <button onclick="agregarAlCarrito(${producto.inProducto})" class="btn-add-car"><span><img src="../img/carrito.jpg" alt=""></span>Agregar al carrito</button>
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
    
`;

    })
    
  })
}

function reenderizarCategoria(idCategoria){
  axios({
    method: 'GET',
    url: `../../backend/api/productos.php?idCategoria=${idCategoria}`,
    responseType: 'json'
  }).then(res=>{
    if(res.data){
      // Obtener el nombre de la empresa
      console.log("Reenderizando categorias");
      mostrarMaincompras(false);
      mostrarProductosCategoria(true);
      mostrarProductosDetalle(false);
      res.data.forEach(producto => {
        obtenerEmpresa(producto.idEmpresa).then(empresa => {
          let nombreEmpresa = empresa.data.nombreEmpresa
          document.getElementById("contenedor-productos").innerHTML += `
          <div class="col-3">
              <div class="card" onclick="reenderizarDetalleProducto(${producto.idProducto})" style="cursor:pointer;" style="width: 19rem;">
                <img class="min-producto" src="../${producto.imagen}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="nombre-producto">${producto.nombreProducto}</h6>
                  <h6>Por ${nombreEmpresa}</h6>
                  <span>L. ${producto.precio} + L. ${costoEnvio} en envios</span>
                </div>
              </div>
          </div>
          `;
        })  
      });

    }

  }).catch(error=>{ 
      console.error(error);
  });
}

function obtenerEmpresa(idEmpresa){
  let consulta =  axios({
    method: 'GET',
    url: `../../backend/api/empresas.php?idEmpresa=${idEmpresa}`,
    responseType: 'json'
  });
  return consulta;

}

function reenderizarMasVendidos(){
  document.getElementById("mas-vendidos").innerHTML = "";
  categorias.forEach(categoria => {
    url = `../../backend/api/productos.php?nombreVentaCategoria=${categoria}`;
    axios({
      method: 'GET',
      url: url,
      responseType: 'json'
    }).then(masVendidos=>{
      
      let venta = masVendidos.data;
      if(venta){
        // Obtener el producto de esa categoria
        let htmlListaProductos = `<li style="background: #ffffff;">`
        let contadorCentinela = 1;
        let contador = 0;
        venta.productos.forEach(producto => {
          obtenerProducto(producto.idProducto).then(objProducto => {
            // Llenar la lista de productos mas vendidos
            htmlListaProductos += `<img class="item-scroll mx-2" src="../${objProducto.data.imagen}" alt="">`;
            if(contadorCentinela == 6){
              htmlListaProductos += `</li>
              <li style="background: #ffffff;">`;
              contadorCentinela = 1;
            }
            if((contador == venta.productos.length -1) || (contador == 13)){
              htmlListaProductos += "</li>";

              
              document.getElementById("mas-vendidos").innerHTML += `
              <div class="col-12 my-2">
              <div style="background-color: white;">
                <h2 class="titulo-scroll my-2">Lo mas vendido en ${categoria}</h2>
                  <ul class="gallery my-2">
                    ${htmlListaProductos}
                  </ul>
              </div>
            </div>
              
              `;
            }
            
            contadorCentinela ++;
            contador ++;

          })
        });

      }
        

    }).catch(error=>{ 
        console.error(error);
    });
    
  });
}



function obtenerProducto(idProducto){
  let consulta = axios({
    method: 'GET',
    url: `../../backend/api/productos.php?idProducto=${idProducto}`,
    responseType: 'json'
  });

  return consulta;
}

function obtenerCategoriaProducto(idCategoria){
  let consulta = axios({
    method: 'GET',
    url: `../../backend/api/categorias.php?idCategoria=${idCategoria}`,
    responseType: 'json'
  });

  return consulta;
}

function init(){
  mostrarMaincompras();
  mostrarProductosCategoria(false);
  mostrarProductosDetalle(false);
  reenderizarTarjetasCategorias();
  reenderizarMasVendidos();

}

function seleccionarUsuario () {
  axios({
      method: 'GET',
      url: `../../backend/api/usuarios.php?idUsuario=${idUsuario}`,
      responseType: 'json'
    }).then(res=>{
        this.usuarioSeleccionado = res.data;
        document.getElementById("nombre-usuario").innerHTML = `
        Hola, ${usuarioSeleccionado.nombre}
        `;

    }).catch(error=>{ 
        console.error(error);
    });
}


seleccionarUsuario();


init();

