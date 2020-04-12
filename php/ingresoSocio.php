<?php
    function mi_autocargador($clase) {
        include_once("../php/class/" . $clase . ".class.php");
      }
      
    spl_autoload_register('mi_autocargador');

    if(isset($_POST['numt']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['numc']) && isset($_POST['pasaje']) && isset($_POST['poligono'])){
        $numt = $_POST['numt'];
        $nom = $_POST['nombre'];
        $ape = $_POST['apellido'];
        $tel = $_POST['telefono'];
        $numc = $_POST['numc'];
        $pasaje = $_POST['pasaje'];
        $pol = $_POST['poligono'];

        $ingreso = new metodos();
        $validoSelect = "SELECT id_casa FROM casa WHERE num_casa = '$numc' AND pasaje='$pasaje' AND poligono='$pol'";
        $validar = $ingreso->mostrar($validoSelect);
        $cuentoValidar = mysqli_num_rows($validar);
        if($cuentoValidar == 0){
        $espero = $ingreso->insertarCasaSocio($numc, $pasaje, $pol);
        if($espero == 1){
            $sql = "SELECT id_casa FROM casa WHERE num_casa = '$numc' AND pasaje='$pasaje' AND poligono='$pol'";
            $obtengo = $ingreso->mostrar($sql);
            $cuento = mysqli_num_rows($obtengo);
            if($cuento == 1){
                $data = mysqli_fetch_array($obtengo);
                $idCasa = $data['id_casa'];
                $ultimo = $ingreso->insertarDatosSocio($numt, $nom, $ape, $tel, $idCasa);
                if($ultimo == 1){
                    echo "1";
                }else{
                    echo"error en el ultimo insert";
                }
            }else{
                echo "error al verificar";
            }
        }else{
            echo "error en el primer insert";
        }    
    }else{
        echo "Casa ya existente, revisar los datos!";
    }

    }
?>