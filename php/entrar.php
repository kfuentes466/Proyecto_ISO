<?php
if(isset($_POST['usu']) && isset($_POST['pass'])){
    session_start();
    function mi_autocargador($clase) {
        include_once("../php/class/" . $clase . ".class.php");
      }
      
      spl_autoload_register('mi_autocargador');
      $usuario = $_POST['usu'];
      $pass = $_POST['pass'];
      $conecto = new metodos();
      $sql = "SELECT id_usuario FROM usuarios WHERE id_usuario='".$usuario."' AND contrasena ='".$pass."'";
      $verifico = $conecto->mostrar($sql) ; 
      $cuento = mysqli_num_rows($verifico);
      if($cuento > 0){
        $data = mysqli_fetch_array($verifico);
        $_SESSION['usuario'] = $data['id_usuario'];
        echo "1";
      }else{
          echo "error";
      }
}
?>