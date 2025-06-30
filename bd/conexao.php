<?php
    $hostname="localhost";
    $bd="petcom59_petcomp_db";
    $usuario="root";
    $senha="";

    try{
        $mysqli = mysqli_connect($hostname, $usuario, $senha, $bd);
    }
    catch(mysqli_sql_exception $e){
        echo "Erro ao conectar ao banco de dados:" . $e->getMessage();
    }
    

?>
