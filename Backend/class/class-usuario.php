<?php
    class Usuario {
        private $idUsuario;
        private $nombre;
        private $correo;
        private $contrasenia;
        private $ordenes;
        private $carrito;

        public function __construct($nombre, $correo, $contrasenia, $ordenes, $carrito){
            $this->idUsuario = $this->generarId();
            $this->nombre = $nombre;
            $this->correo = $correo;
            $this->contrasenia = sha1($contrasenia);
            $this->ordenes = $ordenes;
            $this->carrito = $carrito; 
        }

        public function obtenerUsuario($idUsuario){
            $usuarios = json_decode(file_get_contents("../data/usuarios.json"),true);
            for ($i=0; $i < sizeof($usuarios) ; $i++) { 
                if($usuarios[$i]["idUsuario"] == $idUsuario){
                    return $usuarios[$i];
                }
                
            }
            return null;
        }

        public function guardarUsuario(){

            if($this->existeUsuario($this->correo)){
                $mensaje = array(
                    "estado"=> "error",
                    "mensaje" => "Ya existe un usuario registrado con este correo"
                );
                return $mensaje;
            }else{

                $usuario = array(
                    "idUsuario" => $this->idUsuario,
                    "nombre" => $this->nombre,
                    "correoE" => $this->correo,
                    "contrasenia" => $this->contrasenia,
                    "ordenes" => $this->ordenes,
                    "carrito"  => $this->carrito
                );

                $usuarios = json_decode(file_get_contents("../data/usuarios.json"),true);
                $usuarios[] = $usuario;
                $archivo = fopen("../data/usuarios.json","w");
                fwrite($archivo, json_encode($usuarios));
                fclose($archivo);
                $mensaje = array(
                    "estado"=> "exito",
                    "mensaje" => "El usuario ha sido registrado correctamente."
                );
                return $mensaje;
            }
        }



        public function existeUsuario($correo){
            $usuarios = json_decode(file_get_contents("../data/usuarios.json"),true);
            for ($i=0; $i < sizeof($usuarios) ; $i++) { 
                if($usuarios[$i]["correoE"] == $correo){
                    return true;
                }
            }
            return false;
        }


        public function generarId(){
            $usuarios = json_decode(file_get_contents("../data/usuarios.json"),true);
            if(sizeof($usuarios) == 0){
                    return 1;
            }else{
                    $id = $usuarios[sizeof($usuarios)-1]["idUsuario"] + 1;
                    return $id;
            }
        }

        /**
         * Get the value of idUsuario
         */ 
        public function getIdUsuario()
        {
                return $this->idUsuario;
        }

        /**
         * Set the value of idUsuario
         *
         * @return  self
         */ 
        public function setIdUsuario($idUsuario)
        {
                $this->idUsuario = $idUsuario;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }


        /**
         * Get the value of correo
         */ 
        public function getCorreo()
        {
                return $this->correo;
        }

        /**
         * Set the value of correo
         *
         * @return  self
         */ 
        public function setCorreo($correo)
        {
                $this->correo = $correo;

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

        /**
         * Get the value of ordenes
         */ 
        public function getOrdenes()
        {
                return $this->ordenes;
        }

        /**
         * Set the value of ordenes
         *
         * @return  self
         */ 
        public function setOrdenes($ordenes)
        {
                $this->ordenes = $ordenes;

                return $this;
        }

        /**
         * Get the value of carrito
         */ 
        public function getCarrito()
        {
                return $this->carrito;
        }

        /**
         * Set the value of carrito
         *
         * @return  self
         */ 
        public function setCarrito($carrito)
        {
                $this->carrito = $carrito;

                return $this;
        }
    }

?>