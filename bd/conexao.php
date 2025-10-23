<?php
    $hostname="localhost";
    $bd="petcom59_petcomp_db";
    $usuario="petcom59_petcomp_site";
    $senha="37muhgCQhG9rj2n";

    try{
        $mysqli = mysqli_connect($hostname, $usuario, $senha, $bd);
    }
    catch(mysqli_sql_exception $e){
        echo "Erro ao conectar ao banco de dados:" . $e->getMessage();
    }
    

?>
