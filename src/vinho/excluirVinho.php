<?php
    
    require_once("../funcao/conexao.php");

    $PDO = CriarConexao();

    $ID = $_GET["id"];

    $CmdSQL = "DELETE FROM vinho WHERE IDVinho = :ID";

    $Resultado = $PDO->prepare($CmdSQL);
    $Resultado->bindParam(":ID",$ID);
    $Resultado->execute();

    header("location: pagCatalogoVinho.php");
    
?>