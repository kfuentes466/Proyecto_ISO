<?php
    if(isset($_POST['a'])){
        function mi_autocargador($clase) {
            include_once("../php/class/" . $clase . ".class.php");
          }
          
        spl_autoload_register('mi_autocargador');

        $idSocio = $_POST["a"];
        $borro = new metodos();
        $borrando = $borro->eliminarSocio($idSocio);
        if($borrando == 1){
            $sqlDeuda = "SELECT * FROM deuda WHERE id_socio='$idSocio'";
            $muetro = $borro->mostrar($sqlDeuda);
            $contar = mysqli_num_rows($muetro);
            if($contar == 1){
                $eliminarDeuda = $borro->eliminarDeuda($idSocio);
                echo "1";
            }else{
                echo "1";
            }
        }
    }
?>