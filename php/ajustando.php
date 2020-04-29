<?php
    if(isset($_POST["id"]) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['contra'])){
        function mi_autocargador($clase) {
            include_once("../php/class/" . $clase . ".class.php");
          }
          
          spl_autoload_register('mi_autocargador');

        $id=$_POST['id'];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $contra = $_POST["contra"];

        $modifico = new metodos();
        $modificando = $modifico->modificarPersonales($id,$nombre,$apellido,$contra);
        if($modificando == 1){
            session_start();
            $_SESSION['usuario']['id'] = $id;
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']["ape"]  = $apellido;
            $_SESSION['usuario']['contra']=$contra;
            echo "Se han modificado los datos con exito!";
        }else{
            echo "error";
        }
    }
?>