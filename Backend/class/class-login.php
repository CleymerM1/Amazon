<?php
    include('class-usuario.php');
    class Login {
        private $correoElectronico;
        private $contrasenia;

        public function __construct($correoElectronico, $contrasenia){
            $this->correoElectronico = $correoElectronico;
            $this->contrasenia = $contrasenia;
        }

        public function verificarUsuario(){
            $usuarios = json_decode(file_get_contents("../data/usuarios.json"),true);
                for ($i=0; $i < sizeof($usuarios) ; $i++) { 
                    if($usuarios[$i]["correoE"] == $this->correoElectronico){
                        if($usuarios[$i]["contrasenia"] == sha1($this->contrasenia)){
                            
                            return $usuarios[$i];
                        }
      
                    }
                }
                return null;
        }
        


        /**
         * Get the value of correoElectronico
         */ 
        public function getCorreoElectronico()
        {
                return $this->correoElectronico;
        }

        /**
         * Set the value of correoElectronico
         *
         * @return  self
         */ 
        public function setCorreoElectronico($correoElectronico)
        {
                $this->correoElectronico = $correoElectronico;

                return $this;
        }

        /**
         * Get the value of contrasenia
         */ 
        public function getContrasenia()
        {
                return $this->contrasenia;
        }

        /**
         * Set the value of contrasenia
         *
         * @return  self
         */ 
        public function setContrasenia($contrasenia)
        {
                $this->contrasenia = $contrasenia;

                return $this;
        }
    }

?>