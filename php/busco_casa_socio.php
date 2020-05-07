<?php
    if(!empty($_POST["pasaje"]) && !empty($_POST["poligono"]) && !empty($_POST["numc"])){
        function mi_autocargador($clase) {
            include_once("../php/class/" . $clase . ".class.php");
          }
        
        spl_autoload_register('mi_autocargador');

        session_start();
        
        $pasaje = $_POST["pasaje"];
        $poligono = $_POST["poligono"];
        $numc = $_POST["numc"]; 

        $busco = new metodos();
        $sql = "SELECT id_casa  FROM casa WHERE num_casa='$numc' AND pasaje='$pasaje' AND poligono='$poligono'";
        $veo = $busco->mostrar($sql);
        $cuento = mysqli_num_rows($veo);
        if($cuento == 1){
            $dataCasa = mysqli_fetch_array($veo);
            $idCasa = $dataCasa["id_casa"];
            
            $sqlSocio = "SELECT * FROM socio WHERE id_casa='$idCasa'";
            $veoSocio = $busco->mostrar($sqlSocio);
            $cuentoSocio = mysqli_num_rows($veoSocio);
            if($cuentoSocio == 1){
                $dataSocio = mysqli_fetch_array($veoSocio);
                $act = $dataSocio["activo"];
            if($act == 1){
                echo '
                <script src="../js/pago_agua.js"></script>
            <form class="register" id="quitar">
            <div class="form-group"> 
                <div><center><h2 style="color:white; margin-top: 0.5px; ">Datos de Socio</h2></center></div>
              
                <label for="full_name_id" class="control-label">Numero de tarjeta</label>
                <input type="number" class="form-control" id="numt" name="numt" placeholder="####" maxlengt="4" require value="'.$dataSocio["num_tarjeta"].'" disabled="true">
            </div>    

            <div class="form-group"> <!-- Street 1 -->
                <label for="street1_id" class="control-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="ej. Victor" require value="'.$dataSocio["nombre"].'" disabled="true">
            </div>                    
                            
            <div class="form-group"> <!-- Street 2 -->
                <label for="street2_id" class="control-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="ej. Flores " require value="'.$dataSocio["apellido"].'" disabled="true">
            </div> ';     
            $sqldeuda = "SELECT *  FROM deuda WHERE id_socio='".$dataSocio["id"]."'";
            $veoDeuda = $busco->mostrar($sqldeuda);
            $cuento = mysqli_num_rows($veoDeuda);
            if($cuento == 1){
                //Aca tengo que poner un hidden
                $dataDeuda = mysqli_fetch_array($veoDeuda);
                echo '
                <div class="form-group"> <!-- Zip Code-->
                    <label for="zip_id" class="control-label">El socio abonara a la deuda? </label><br/>
                    <label>No</label><input type="radio" class="form-control" id="No" name="rd1" value="No" checked="checked" ><br/>
                    <label>Si</label><input type="radio" class="form-control" id="Si" name="rd2" value="Si"><br/>
                    <input type="text" class="form-control monto"  style="display:none;" value="Deuda acumulada : $'.$dataDeuda["monto"].'" disabled="true"><br/>
                    <input type="number" class="form-control monto" id="monto" name="monto" step="0.01" min="1" style="display:none;" placeholder="Ingrese la deuda"><br/>
                </div> 
                <input type="hidden" id="idDeuda" value="'.$dataDeuda["id_deuda"].'"/>
                <input type="hidden" id="montoDeuda" value="'.$dataDeuda["monto"].'" />';
            }
            
            echo '
            <div class="form-group"> <!-- Street 2 -->
                <label for="street2_id" class="control-label">Pago del mes</label>
                <input type="text" class="form-control" id="pago" name="apellido" placeholder="ej. Flores " require value="$7.00" disabled="true">
            </div>

            <div id="resp2"></div>
            <div class="form-group"> <!-- Submit Button -->
                <input type="button" value="Pagar" class="btn btn-primary" id="boton"/>
            </div>
            <input type="hidden" id="idSocio" value="'.$dataSocio["id"].'"/>
            <input type="hidden" id="idEmpleado" value="'.$_SESSION["usuario"]["id"].'"/>
            <input type="hidden" id="nombres" value="'.$dataSocio["nombre"].' '.$dataSocio["apellido"].'"/>
            </form>                            
            ';
            }else{
                echo'
                <center>
                    <div class="alert alert-danger alert-dismissible" id="quitar" style="width:44%;">
                        <strong>Error!</strong> Esta casa esta vacia!, si desea habilitar usuario de click <a href="activarUsuario.php?sshs='.$dataSocio["id"].'&ante=pago_agua.php">aquí</a>
                    </div></center>
                ';
            }
        }
        }else{
            echo '  <center>
                    <div class="alert alert-danger alert-dismissible" id="quitar" style="width:44%;">
                        <strong>Error!</strong> Algo salio mal, por favor revisa la direccion!!
                    </div></center>
                  ';
        }
    }
?>