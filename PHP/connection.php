<?php
    $Con;

    function Conectar() {

    return pg_connect("host='localhost' port='5432' dbname='salasReuniao' user='postgres' password='root'");	  
    };

    Function ObterConexao(){
    if (!isset($con)){
        $con = conectar();	
    } 
    
    return $con;
    };

?>