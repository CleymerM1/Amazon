
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

function desplegarAyuda(accion){
    if(accion == 'desplegar'){
        document.getElementById('desplegar-seccion').innerHTML = 
            `
            <div class="row">
                <div class="col-12">
                    <i class="fas fa-angle-right">
                        <span onclick="desplegarAyuda('contraer');" style="color: rgb(33, 95, 153);">
                            <a href="#">¿Necesitas Ayuda?</a>
                            
                        </span>
                    </i> 
                </div>
        
                <div class="col-12">
                    <span style="color: rgb(33, 95, 153);">
                        <a href="#">¿Olvidaste tu contraseña?</a>
                        
                    </span>
                <div class="col-12">
                    <span style="color: rgb(33, 95, 153);">
                        <a href="#">Otros problemas con el inicio de sesión</a>
                        
                    </span>
                
                </div>
                
                
            </div>    
            `;

    }else{
        document.getElementById('desplegar-seccion').innerHTML = 
        `
        <div class="row">
            <div class="col-12">
                <i class="fas fa-angle-right">
                    <span onclick="desplegarAyuda('desplegar');" style="color: rgb(33, 95, 153);">
                        ¿Necesitas Ayuda?
                    </span>
                </i> 
            </div>        
        </div>    
        `;

    }
}

// iniciar sesión

function login(){
    let datos = {
        correo : document.getElementById("email").value,
        contrasenia: document.getElementById("contraseña").value
    }
    axios({
        method: 'post',
        url: `../../backend/api/login.php`,
        responseType: 'json',
        data: datos
    }).then(res=>{

        if(res.data){
            console.log("Inicio de sesión correcto");
            
            window.location.href = "compras.php";
        }else{
            document.getElementById("mensaje-login").innerHTML = `
            <div  style="display: block;" class="alert alert-danger" role="alert">
                ¡Error!, correo o contraseña incorrectos
            </div>
            `
        }

    }).catch(error=>{
        console.error(error); 
    });

}





/*
  axios({
    method: 'GET',
    url: url,
    responseType: 'json'
  }).then(res=>{
      console.log(res.data);
      this.usuarios = res.data;
      llenarTabla();
  }).catch(error=>{ 
      console.error(error);
  });
*/



// Onchange para seleccionar un usuario



