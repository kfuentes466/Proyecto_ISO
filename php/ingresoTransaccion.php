<?php
    //Aqui va el codigo
    if(isset($_POST["idSocio"]) && isset($_POST["idEmpleado"]) && isset($_POST["idDeuda"]) && isset($_POST["monto"]) && isset($_POST["montoDeuda"]) && isset($_POST["numt"]) && isset($_POST["nombres"])){
        
        function mi_autocargador($clase) {
            include_once("../php/class/" . $clase . ".class.php");
          }
        
        spl_autoload_register('mi_autocargador');

        $idSocio = $_POST["idSocio"];
        $idEmpleado = $_POST["idEmpleado"];
        $idDeuda = $_POST["idDeuda"];
        $aPagar = $_POST["monto"];
        $pagandoDeuda = $_POST["montoDeuda"];
        $tarifa = 2.50;
        $fecha = date("Y")."/".date("m")."/".date("m");
        $total =7;
        if($aPagar < $pagandoDeuda){
        $idTransaccion = md5($idSocio."-".$idEmpleado."-".$fecha );
        $pago = new metodos();
        $sql = "SELECT id_transaccion FROM transaccion WHERE id_transaccion='$idTransaccion'";
        $veo = $pago->mostrar($sql);
        $cuento = mysqli_num_rows($veo);
        if($cuento == 0){
            $ingresoTransaccion = $pago->insertarTransaccion($idTransaccion, $idSocio,$idDeuda,$fecha,$idEmpleado);
            if($ingresoTransaccion == 1){
                
                   
                    echo'
                        <div id="quitar" style="width:43%; margin-left:28%; background-color:white;">
                        <table class="table  table-hover"  >
                            <caption>Recibo</caption>
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col"> Recibo de pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"> Número tarjeta </th>
                                    <td>'.$_POST["numt"].'<td>
                                </tr>
                                <tr>
                                    <th scope="row"> Nombre </th>
                                    <td>'.$_POST["nombres"].'<td>
                                </tr>
                                <tr>
                                    <th scope="row"> Mensualidad </th>
                                    <td> $7.00</td>
                                </tr>
                            ';
                    if($aPagar != 0 && $pagandoDeuda != 0 && $idDeuda != 0){
                        $cambio = ($pagandoDeuda- $aPagar);
                        $modifico = $pago->modificarDeuda($idDeuda,$idSocio,$cambio);
                        if($modifico == 1){
                            echo'
                                <tr>
                                    <th scope="row">Abono a deuda</th>
                                    <td> $'.$aPagar.'</td>
                                </tr>
                            ';
                            $total = $total + $aPagar;
                        }
                    }
                    echo'
                            <tr>
                                <th scope="row"> Total </th>
                                <td> $'.$total.'</td>
                            </tr>
                        </tbody>
                    </table></div>';
                
            }
        }else{
            echo '  <center>
                    <div class="alert alert-danger alert-dismissible" id="quitar" style="width:44%;">
                        <strong>Error!</strong> El socio ya hizo el pago de este mes!!
                    </div></center>
                  ';
        }
        }else{
            echo '  <center>
            <div class="alert alert-danger alert-dismissible" id="quitar" style="width:44%;">
                <strong>Error!</strong> El monto del abono sobrepasa la deuda!
            </div></center>
          ';
        }
        
    }
?>