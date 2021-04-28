<?php
    class Producto {
        private $idProducto;
        private $idEmpresa;
        private $idCategoria;
        private $nombreProducto;
        private $precio;
        private $descripcion;
        private $imagen;

        public function __construct($idEmpresa, $idCategoria, $nombreProducto, $precio, $descripcion, $imagen){
            $this->idProducto = $this->generarId();
            $this->idEmpresa = $idEmpresa;
            $this->idCategoria = $idCategoria;
            $this->nombreProducto = $nombreProducto;
            $this->precio = $precio;
            $this->descripcion = $descripcion;
            $this->imagen = $imagen;            
        }

        public function obtenerProductosPorCategoria($idCategoria){
                $productos = json_decode(file_get_contents("../data/productos.json"),true);
                $productosCategoria = array();
                for ($i=0; $i < sizeof($productos); $i++) { 
                        if($productos[$i]["idCategoria"] == $idCategoria){
                                $productosCategoria[] = $productos[$i];
                        }
                }
                return $productosCategoria;
        }

        public function obtenerProducto($id){
                $productos = json_decode(file_get_contents("../data/productos.json"),true);
                for ($i=0; $i < $productos ; $i++) { 
                        if($productos[$i]["idProducto"] == $id){
                                return $productos[$i];
                        }
                }
                return null;

        }
        public function obtenerMasVendido($idCategoria){
                $ventas = json_decode(file_get_contents("../data/ventas.json"),true);
                for ($i=0; $i < sizeof($ventas) ; $i++) { 
                        if($ventas[$i]["idCategoria"] == $idCategoria){
                                return $ventas[$i];
                        }
                }
                return null;
        }

        public function obtenerIdVentaCategoria($nombreCategoria){
                $categorias = json_decode(file_get_contents("../data/categorias.json"),true);
                for ($i=0; $i < sizeof($categorias) ; $i++) { 
                        if($categorias[$i]["nombreCategoria"] == $nombreCategoria){
                                return $categorias[$i]["idCategoria"];
                        }
                }
                return -1;

        }
        
        public function generarId(){
                $productos = json_decode(file_get_contents("../data/productos.json"),true);
                if(sizeof($productos) == 0){
                        return 1;
                }else{
                        $id = $productos[sizeof($productos)-1]["idCategoria"] + 1;
                        return $id;
                }
            }


        /**
         * Get the value of idProducto
         */ 
        public function getIdProducto()
        {
                return $this->idProducto;
        }

        /**
         * Set the value of idProducto
         *
         * @return  self
         */ 
        public function setIdProducto($idProducto)
        {
                $this->idProducto = $idProducto;

                return $this;
        }

        /**
         * Get the value of idEmpresa
         */ 
        public function getIdEmpresa()
        {
                return $this->idEmpresa;
        }

        /**
         * Set the value of idEmpresa
         *
         * @return  self
         */ 
        public function setIdEmpresa($idEmpresa)
        {
                $this->idEmpresa = $idEmpresa;

                return $this;
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
         * Get the value of nombreProducto
         */ 
        public function getNombreProducto()
        {
                return $this->nombreProducto;
        }

        /**
         * Set the value of nombreProducto
         *
         * @return  self
         */ 
        public function setNombreProducto($nombreProducto)
        {
                $this->nombreProducto = $nombreProducto;

                return $this;
        }

        /**
         * Get the value of precio
         */ 
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */ 
        public function setPrecio($precio)
        {
                $this->precio = $precio;

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