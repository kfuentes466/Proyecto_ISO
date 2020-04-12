<?php
    function mi_autocargador($clase) {
        include_once("../php/class/" . $clase . ".class.php");
      }
      
    spl_autoload_register('mi_autocargador');

    if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido'])){
        $id = $_POST['id'];
        $nom = $_POST['nombre'];
        $ape = $_POST['apellido'];

        $ingreso = new metodos();
        $validoSelect = "SELECT id_usuario FROM usuarios WHERE id_usuario = '$id'";
        $validar = $ingreso->mostrar($validoSelect);
        $cuentoValidar = mysqli_num_rows($validar);
        if($cuentoValidar == 0){
        $espero = $ingreso->insertarDatosEmpleado($id,$nom,$ape);
            if($espero == 1){
                echo "1";
            }else{
                echo "Error al ingresarn datos!";
            }  

            }else{
                echo "Id ya utilizado!!!";
            }

    }
?>