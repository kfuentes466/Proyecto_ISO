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
            $sql = "INSERT into socio(num_tarjeta, nombre, apellido, telefono, id_casa, activo) VALUES('$numt', '$nom', '$ape', '$tel' , '$idcasa','1')";
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

        public function insertarDeuda($id,$dolares){
            $con = new conectar();
            $conexion = $con->conexion();
            $sql = "INSERT INTO deuda(monto, estado, id_socio) VALUES('$dolares', '1', '$id')";
            $result = mysqli_query($conexion, $sql);
            return $result;
        }

        public function insertarTransaccion($idTransaccion, $idSocio,$idDeuda,$fecha,$idEmpleado){
            $con = new conectar();
            $conexion = $con->conexion();
            $sql = "";
            if($idDeuda == 0){
                $sql = "INSERT INTO transaccion (id_transaccion, id_socio, pago, fecha, id_usuario) VALUES('$idTransaccion', '$idSocio', '7.00', '$fecha', '$idEmpleado')";
            }else {
                $sql = "INSERT INTO transaccion (id_transaccion, id_socio, id_deuda,pago, fecha, id_usuario) VALUES('$idTransaccion', '$idSocio', '$idDeuda', '7.00', '$fecha', '$idEmpleado')";
            }
            $result = mysqli_query($conexion,$sql);
            return $result;
        }

        public function modificarDeuda($idDeuda,$idSocio,$cambio){
            $con = new conectar();
            $conexion = $con->conexion();
            $sql = "UPDATE deuda SET monto='$cambio' WHERE id_deuda='$idDeuda' AND id_socio='$idSocio'";
            $result = mysqli_query($conexion,$sql);
            return $result;
        }


        public function modificarPersonales($id,$nombre,$apellido,$contra){
            $con = new conectar();
            $conexion = $con->conexion();
            $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', contrasena='$contra' WHERE id_usuario='$id' ";
            $result = mysqli_query($conexion,$sql);
            return $result;
        }

        public function eliminarSocio($id){
            $con = new conectar();
            $conexion = $con->conexion();
            $sql = "UPDATE socio SET activo='0' ,num_tarjeta='0' ,nombre=' ' ,apellido=' ' ,telefono=' '  WHERE id='$id'";
            $result = mysqli_query($conexion,$sql);
            return $result;
        }

        public function modificarSocio($id,$numt,$nombre,$apellido,$telefono)
        {
            $con = new conectar();
            $conexion = $con->conexion();
            $sql = "UPDATE socio SET activo='1' ,num_tarjeta='$numt' ,nombre='$nombre' ,apellido='$apellido' ,telefono='$telefono'  WHERE id='$id'";
            $result = mysqli_query($conexion,$sql);
            return $result;
        }

        public function eliminarDeuda($idSocio){
            $con = new conectar();
            $conexion = $con->conexion();
            $sql = "DELETE FROM deuda WHERE id_socio='$idSocio'";
            $result = mysqli_query($conexion,$sql);
            return $result;
        }
    }
?>