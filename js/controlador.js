

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



/*

function validarCampoVacio(id){
    let campo = document.getElementById(id);

    if(campo.value== '') {
        campo.classList.remove('input-success');
        campo.classList.add('input-error');
    
    }else{
        campo.classList.remove('input-error');
        campo.classList.add('input-success');
    }
}

function validarCorreo(campo) {
    console.log(campo.value);
    const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(regex.test(campo.value)){
        campo.classList.remove('input-error');
        campo.classList.add('input-success');
    }else{
        campo.classList.remove('input-success');
        campo.classList.add('input-error');
    }
}

*/