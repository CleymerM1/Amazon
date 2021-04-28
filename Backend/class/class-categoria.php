<?php
    class Categoria{
        private $idCategoria;
        private $nombreCategoria;
        private $descripcion;
        private $imagen;

        public function __construct($nombreCategoria, $descripcion, $imagen)        {
            $this->idCategoria = $this->generarId();
            $this->nombreCategoria = $nombreCategoria;
            $this->descripcion = $descripcion;
            $this->imagen = $imagen;
        }

        public function obtenerCategorias(){
            $categorias = json_decode(file_get_contents("../data/categorias.json"),true);
            return $categorias;
        }

        public function obtenerCategoria($idCategoria){
            $categorias = json_decode(file_get_contents("../data/categorias.json"),true);
            for ($i=0; $i < sizeof($categorias) ; $i++) { 
                if($categorias[$i]["idCategoria"] == $idCategoria){
                    return $categorias[$i];
                }
            }
            return null;
        }


        public function generarId(){
            $categorias = json_decode(file_get_contents("../data/categorias.json"),true);
            if(sizeof($categorias) == 0){
                    return 1;
            }else{
                    $id = $categorias[sizeof($categorias)-1]["idCategoria"] + 1;
                    return $id;
            }
        }

        /**
         * Get the value of idCategoria
         */ 
        public function getIdCategoria()
        {
                return $this->idCategoria;
        }

        /**
         * Set the value of idCategoria
         *
         * @return  self
         */ 
        public function setIdCategoria($idCategoria)
        {
                $this->idCategoria = $idCategoria;

                return $this;
        }

        /**
         * Get the value of nombreCategoria
         */ 
        public function getNombreCategoria()
        {
                return $this->nombreCategoria;
        }

        /**
         * Set the value of nombreCategoria
         *
         * @return  self
         */ 
        public function setNombreCategoria($nombreCategoria)
        {
                $this->nombreCategoria = $nombreCategoria;

                return $this;
        }

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of imagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }
    }


?>