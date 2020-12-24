<?php
    session_start();

    if(isset($_SESSION["logado"])):
        require_once("../funcao/conexao.php");
        $CPF = $_SESSION["CPF"];

        $PDO = CriarConexao();
    else:
        header("location: ../inicial/index.php");
    endif;

    $CmdSQL = "DELETE FROM usuario WHERE CPF = :CPF";
    $Resultado = $PDO->prepare($CmdSQL);
    $Resultado->bindParam(':CPF', $CPF);
    $Resultado->execute();

    header("location: ../funcao/logout.php");
?>