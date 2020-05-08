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
      $sql = "SELECT * FROM usuarios WHERE id_usuario='".$usuario."' AND contrasena ='".$pass."'";
      $verifico = $conecto->mostrar($sql) ; 
      $cuento = mysqli_num_rows($verifico);
      if($cuento > 0){
        $data = mysqli_fetch_array($verifico);
        $userinfo = array();
        $userinfo['id'] = $data['id_usuario'];
        $userinfo['nombre'] = $data['nombre'];
        $userinfo["ape"]  = $data['apellido'];
        $userinfo['contra']=$data["contrasena"];
        $userinfo['tipo']= $data["tipo"];
        $_SESSION['usuario'] = $userinfo;
        //$_SESSION['usuario'] = $data['id_usuario'];
        echo "1";
      }else{
          echo "error";
      }
}
?>