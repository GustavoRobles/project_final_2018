
<?php

function openCon($ini_file){
    
    $config=parse_ini_file($ini_file);
    
    $conexion=new mysqli($config['NOMSERVER'],$config['USER'],$config['PASS'],$config['NOMBDD']);
    
    IF($conexion->connect_errno>0){
        die("Desconectado");
    }
    
    return $conexion;
    
}

function closeCon($conexion){
    $conexion->close();
}

?>