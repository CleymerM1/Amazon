document.getElementById("mensaje-registro").innerHTML = `
                <div  style="display: none;" class="alert alert-success" role="alert">
                    
                </div>    
                `;


function registrarUsuario(){
    let nombre = document.getElementById("nombre").value;
    let correo = document.getElementById("correo").value
    let contrasenia1 = document.getElementById("contraseña1").value;
    let contrasenia2 = document.getElementById("contraseña2").value;
    if(nombre.trim() == "" || correo.trim() == "" || contrasenia1.trim() == "" || contrasenia1.trim() == ""){
        document.getElementById("mensaje-registro").innerHTML = `
        <div  style="display: block;" class="alert alert-danger" role="alert">
            Todos los campos son obligatorios
        </div>    
         `;
         return;
    }
    
    if(contrasenia1 == contrasenia2){
        registro = {
            nombre: nombre,
            correo: correo,
            contrasenia: contrasenia1,
            ordenes: [],
            carrito: []
        };
        axios({
            method: 'post',
            url: `../../backend/api/usuarios.php`,
            responseType: 'json',
            data : registro
          }).then(res=>{
              resultado = res.data;
              if(resultado.estado == "exito"){
                document.getElementById("mensaje-registro").innerHTML = `
                <div  style="display:block;" class="alert alert-success" role="alert">
                    ${resultado.mensaje}
                </div>    
                `;
              }else{
                document.getElementById("mensaje-registro").innerHTML = `
                <div  style="display: block;" class="alert alert-danger" role="alert">
                    ${resultado.mensaje}
                </div>    
                 `;
              }

          }).catch(error=>{ 
              console.error(error);
          });   
    }else{
        document.getElementById("mensaje-registro").innerHTML = `
        <div  style="display: block;" class="alert alert-danger" role="alert">
            Las contraseñas no coinciden
        </div>    
         `;
    }
    console.log(registro);

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