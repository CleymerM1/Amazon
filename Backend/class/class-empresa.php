<?php
    class Empresa {
        private $idEmpresa;
        private $nombreEmpresa;
        private $productos;

        public function __construct($nombreEmpresa, $productos){
            $this->idEmpresa = $this->generarId();
            $this->nombreEmpresa = $nombreEmpresa;
            $this->productos = $productos;
        }

        public function obtenerEmpresa($idEmpresa){
            $empresas = json_decode(file_get_contents("../data/empresas.json"),true);
            for ($i=0; $i < $empresas ; $i++) { 
                if($empresas[$i]["idEmpresa"] == $idEmpresa){
                    return $empresas[$i];
                }
            }
            return null;
        }

        public function generarId(){
            $empresas = json_decode(file_get_contents("../data/empresas.json"),true);
            if(sizeof($empresas) == 0){
                    return 1;
            }else{
                    $id = $empresas[sizeof($empresas)-1]["idEmpresa"] + 1;
                    return $id;
            }
        }
    }

?>