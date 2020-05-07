<?php
    function mi_autocargador($clase) {
        include_once("../php/class/" . $clase . ".class.php");
      }
      
    spl_autoload_register('mi_autocargador');

    
    $ver = new metodos();
    $record_per_page = 6;  
    $page = '';  

    if(isset($_POST["page"]))  
    {  
         $page = $_POST["page"];  
    }  
    else  
    {  
         $page = 1;  
         $cont= 0;
    } 
    
    $start_from = ($page - 1)*$record_per_page;  
    $cont = $start_from;
    $sql = "SELECT socio.id, socio.num_tarjeta, socio.nombre, socio.apellido, socio.telefono, casa.pasaje, casa.poligono, casa.num_casa FROM socio INNER JOIN casa ON socio.id_casa = casa.id_casa WHERE socio.activo='1' LIMIT $start_from, $record_per_page";
    $result = $ver->mostrar($sql);
    $output = '';
    $output .= '<script src="../js/pop_up.js"></script>';
    $output .= '<table class="table table-hover" id="rowcount" style="background-color:white;">
    <thead>
        <tr>
            <th scope="col">#</th> 
            <th scope="col">Numero de tarjeta</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Telefono</th>
            <th scope="col">Dirección</th>
        </tr>
    </thead>
    <tbody id="developers">';
    
	while($data = mysqli_fetch_array($result)){
        $cont = $cont + 1;
        $output .= '
            <tr>
                <td>'.$cont.'</td>
                <td>'.$data["num_tarjeta"].'</td>
                <td>'.$data["nombre"].'</td>
                <td>'.$data["apellido"].'</td>
                <td>'.$data["telefono"].'</td>
                <td> Pasaje : '.$data["pasaje"].', Poligono : '.$data["poligono"].' , número casa : '.$data["num_casa"].'</td>
                <td><a href="activarUsuario.php?sshs='.$data["id"].'&ante=verSocio.php" ><span class="icon">&#xe105;</span></a></td>
                <td><a href="#" id = "'.$data["id"].'" class="open"><span class="icon" style="color:red;">&#xe014;</span></a></td>
               
            </tr>
        ';
    }
    $output .= '</tbody>
                </table>
              </div>
              ';
    $recordSql = "SELECT * FROM socio";
    $record = $ver->mostrar($recordSql);
    $total_records = mysqli_num_rows($record);
    $total_pages = ceil($total_records/$record_per_page);  
    
    $output .= '
    <nav aria-label="...">
        <ul class="pagination">
    ';
    for($i=1; $i<=$total_pages; $i++)  
    {  
         //$output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
         $output .= '
         <li class="page-item "><a class="page-link pagination_link" href="#" id="'.$i.'">'.$i.'</a></li>
         ';
    }  

    $output .= '
        </ul>
    </nav>
    ';

    echo $output;
	
?>