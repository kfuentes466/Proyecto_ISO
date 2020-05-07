<?php

function mi_autocargador($clase) {
    include_once("../php/class/" . $clase . ".class.php");
  }
  
spl_autoload_register('mi_autocargador');

if(isset($_POST['numt']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['dolares']) && isset($_POST["idSocio"]) && isset($_POST["anterior"])){
    $numt = $_POST['numt'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $monto = $_POST['dolares'];
    $id = $_POST["idSocio"];
    $regresar = $_POST["anterior"];

    $mod = new metodos();
    $modificar = $mod->modificarSocio($id,$numt,$nombre,$apellido,$telefono);
    if($modificar == 1){
    $tabla = '
    <div id="quitar" style="width:43%; margin-left:28%; background-color:white; margin-top:10%;">
    <table class="table  table-hover"  >
        <caption>Datos Modificados</caption>
        <thead>
            <tr>
                <th scope="col"> </th>
                <th scope="col"> Informacion modificada</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"> Número tarjeta </th>
                <td>'.$numt.'<td>
            </tr>
            <tr>
                <th scope="row"> Nombre </th>
                <td>'.$nombre.' '.$apellido.'<td>
            </tr>
            <tr>
                <td scope="row">Telefono</td>
                <td>'.$telefono.'</td>
            </tr>
    ';
    if($monto != 0){
        $sqlDeuda = "SELECT * FROM deuda WHERE id_socio='$id'";
        $veoDeuda = $mod->mostrar($sqlDeuda);
        $contar = mysqli_num_rows($veoDeuda);
        if($contar == 1){
            $dataDeuda = mysqli_fetch_array($veoDeuda);
            $deudaExiste = $dataDeuda["monto"];
            $nuevoTotal = $deudaExiste + $monto;
            $idDeuda = $dataDeuda["id_deuda"];
            $modDeuda = $mod->modificarDeuda($idDeuda,$id,$nuevoTotal);
            if($modDeuda == 1){
                $tabla .='
                    <tr>
                        <td scope="row">Deuda Anterior</td>
                        <td> $'.$deudaExiste.'</td>
                    </tr>
                    <tr>
                        <td scope="row">Suma de deuda</td>
                        <td> $'.$monto.'</td>
                    </tr>
                    <tr>
                        <td scope="row">Total deuda</td>
                        <td> $'.$nuevoTotal.'</td>
                    </tr>
                ';
            }else{
                echo 'Error :c';
            }
        }else{
            $insertDeuda = $mod->insertarDeuda($id,$monto);
            if($insertDeuda == 1){
                $tabla .='
                    <tr>
                        <td scope="row">Monto de Deuda</td>
                        <td> $'.$monto.'</td>
                    </tr>
                ';
            }else{
                echo  "Error 2 :,v";
            }
        }
    }
    $tabla .='
        </tbody>
    </table>
        <center><a href="'.$regresar.'">Regresar a ubicacion anterior</a></center>
    </div>
    ';
    echo $tabla;
    }else{
        echo "Error al modificar :c";
    }
}
?>