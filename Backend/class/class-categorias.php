<?php 

class categorias{
                private $nombreCategoria;
                private $descripcion;
                private $color;
                private $imagen;
                private $empresas;
               
                        public function __construct($nombreCategoria, $descripcion, $color,$imagen, $empresas){
                            $this-> nombreCategoria=$nombreCategoria;
                            $this-> descripcion= $descripcion;
                            $this-> color=$color;
                            $this->imagen=$imagen;
                            $this-> empresas= $empresas;
                            

                        }

                        public function getnombreCategoria(){
                            return $this->nombreCategoria;
                        }
                        public function setnombreCategoria($nombreCategoria){
                            $this->nombreCategoria=$nombreCategoria;
                            return $this;
                        }
                        public function getdescripcion(){
                            return $this->descripcion;
                        }
                        public function setdescripcion($descripcion){
                            $this->descripcion=$descripcion;
                            return $this;
                        }
                        public function getcolor(){
                            return $this->color;
                        }
                        public function setcolor($color){
                            $this->color=$color;
                            return $this;
                        }
                        public function getimagen(){
                            return $this->imagen;
                        }
                        public function setimagen($imagen){
                            $this->imagen=$imagen;
                            return $this;
                        }
                        public function getempresas(){
                            return $this->empresas;
                        }
                        public function setempresas($empresas){
                            $this->empresas=$empresas;
                            return $this;
                        }
                        
                    }
?>