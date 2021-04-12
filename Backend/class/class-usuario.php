<?php 

class usuario{
                private $idUsuario;
                private $nombre;
                private $apellido;
                private $nombreUsuario;
                private $correoE;
                private $contraseña;
                private $ordenes;
    


                        public function __construct($idUsuario, $nombre, $apellido,$nombreUsuario, $correoE,$contraseña, $ordenes){
                            $this-> idUsuario=$idUsuario;
                            $this-> nombre= $nombre;
                            $this-> apellido=$apellido;
                            $this->nombreUsuario=$nombreUsuario;
                            $this-> correoE= $correoE;
                            $this-> contraseña=$contraseña;
                            $this-> ordenes=$ordenes;

                        }
                        public static function categorias($idUsuario, $idEmpresa){
                        $usuarioproducto= self::obtenerUsuarioPorId($idUsuario)["ordenes"];
                        for ($i=0; $i>sizeof($usuarioproducto); $i++){
                                if($usuarioproducto[$i]==$idEmpresa){
                                    return true;
                                }
                            }
                            return false;
                        }

                        public function guardarUsuario(){;
                                $usuario =array(

                                        "idUsuario"=> sizeof(self::obtenerUsuarios()),
                                        "nombre"=> $this->nombre,
                                        "apellido"=> $this->apellido,
                                        "nombreUsuario"=>$this->nombreUsuario,
                                        "correoE"=>$this->correoE,
                                        "contraseña"=> $this->contraseña,
                                        "ordenes"=>$this->ordenes,
                                );
                                $usuarios=json_decode(file_get_contents("../data/usuarios.json"),true);
                                $usuarios[]=$usuario;
                                $archivo=fopen("../data/usuarios.json", "w");
                                fwrite($archivo,json_encode($usuarios));
                                fclose($archivo);
                                return true;
                        }     
                        
                        public function actualizarUsuario($idUsuario){
                            $usuario=array(
                                
                                "idUsuario"=> $this->idUsuario,
                                "nombre"=> $this->nombre,
                                "apellido"=> $this->apellido,
                                "nombreUsuario"=>$this->nombreUsuario,
                                "correoE"=>$this->correoE,
                                "contraseña"=> $this->contraseña,
                                "ordenes"=>$this->ordenes,
                            );
                            $usuarios=json_decode(file_get_contents("../data/usuarios.json"),true);
                            for($i=0; $i<sizeof($usuarios);$i++){
                                if($usuarios[$i]["idUsuario"]==$idUsuario){
                                    $usuarios[$i]=$usuario;
                                }
                            }
                            $archivo=fopen("../data/usuarios.json","w");
                            fwrite($archivo,json_encode($usuarios));
                            fclose($archivo);
                            return true;
                        }
                        public static function obtenerUsuarioPorCorreo ($correoE){
                            $usuarios=json_decode(file_get_contents('../data/usuarios.json'),true);
                            for($i=0; $i<sizeof($usuarios); $i++){
                                if($usuarios[$i]["correoE"]==$correoE){
                                    return $usuarios[$i];
                                }
                            }
                            return null;
                        }
                        public static function obtenerUsuarioPorId($idUsuario){
                            $usuarios=json_decode(file_get_contents('../data/usuarios.json'),true);
                            for($i=0; $i<sizeof($usuarios); $i++){
                                if($usuarios[$i]["idUsuario"]==$idUsuario){
                                    return $usuarios[$i];
                                }
                            }
                            return null;
                        }

                        public static function ObtenerIndice($idUsuario){
                            $contenidoArchivo=file_get_contents("../data/usuarios.json");
                            $usuarios=json_decode($contenidoArchivo,true);
                            for($i=0; $i<sizeof($usuarios); $i++){
                                if($usuarios[$i]["idUsuario"]==$idUsuario){
                                    return $i;
                                }
                            }
                            return null;

                        }
                        public static function eliminarUsuario($idUsuario){
                            $indice=self::ObtenerIndice($idUsuario);
                            if($indice){
                                $contenidoArchivo=file_get_contents("../data/usuarios.json");
                                $usuarios=json_decode($contenidoArchivo,true);
                                array_splice($usuarios,$indice,1);
                                $archivo=fopen('../data/usuarios.json','w');
                                fwrite($archivo,json_encode($usuarios));
                                fclose($archivo);
                                return true;
                            }
                            return false;
                        }
                        public static function obtenerUsuarios(){
                            $usuarios=json_decode(file_get_contents("../data/usuarios.json"),true);
                            return $usuarios;
                        }
                        public function getIdUsuario(){
                            return $this->idUsuario;
                        }
                        public function setIdUsuario($idUsuario){
                            $this->idUsuario=$idUsuario;
                            return $this;
                        }
                        public function getnombre(){
                            return $this->nombre;
                        }
                        public function setnombre($nombre){
                            $this->nombre=$nombre;
                            return $this;
                        }
                        public function getapellido(){
                            return $this->apellido;
                        }
                        public function setapellido($apellido){
                            $this->apellido=$apellido;
                            return $this;
                        }
                        public function getnombreUsuario(){
                            return $this->nombreUsuario;
                        }
                        public function setnombreUsuario($nombreUsuario){
                            $this->nombreUsuario=$nombreUsuario;
                            return $this;
                        }
                        public function getcorreoE(){
                            return $this->correoE;
                        }
                        public function setcorreoE($correoE){
                            $this->correoE=$correoE;
                            return $this;
                        }
                        public function getcontraseña(){
                            return $this->contraseña;
                        }
                        public function setcontraseña($contraseña){
                            $this->contraseña=$contraseña;
                            return $this;
                        }
                        public function getordenes(){
                            return $this->ordenes;
                        }
                        public function setordenes($ordenes){
                            $this->ordenes=$ordenes;
                            return $this;
                        }

 


}




?>