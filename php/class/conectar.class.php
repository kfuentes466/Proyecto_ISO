<?php
    class conectar{
        //Aqui se ponen los componentes de su conexion, si tienen algo diferente se cambia aqui
        private $servidor = "localhost";
        private $usuario = "root";
        private $password = "";
        private $bd = "aguase";

        //Metodo para realizar la conexion hacia la bd
        public function conexion(){
            $conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->bd);
            return $conexion;
        }
    }
?>