<?php
    class metodos{

        public function mostrar($sql){
            $con = new conectar();
            $conexion = $con->conexion();
            $result = mysqli_query($conexion,$sql);
            return $result;
        }

        public function insertarCasaSocio($numc, $pasaje, $pol){
            $con = new conectar();
            $conexion = $con->conexion();
            $sql = "INSERT into casa (num_casa, pasaje, poligono) VALUES ('$numc' , '$pasaje' , '$pol')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        }

        public function insertarDatosSocio($numt, $nom, $ape, $tel, $idcasa){
            $con = new conectar();
            $conexion = $con->conexion();
            $sql = "INSERT into socio(num_tarjeta, nombre, apellido, telefono, id_casa) VALUES('$numt', '$nom', '$ape', '$tel' , '$idcasa')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        }

        public function insertarDatosEmpleado($id,$nom,$ape){
            $con = new conectar();
            $conexion = $con->conexion();
            $sql = "INSERT into usuarios(id_usuario, nombre, apellido, contrasena, tipo) VALUES('$id', '$nom', '$ape', '$id' , '2')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        }

    }
?>