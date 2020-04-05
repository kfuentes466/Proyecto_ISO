<?php
    class metodos{

        public function mostrar($sql){
            $con = new conectar();
            $conexion = $con->conexion();
            $result = mysqli_query($conexion,$sql);
            return $result;
        }
    }
?>