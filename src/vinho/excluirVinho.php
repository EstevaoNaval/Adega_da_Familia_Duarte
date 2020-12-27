<?php
    session_start();

    if(isset($_SESSION["logado"])):
        require_once("../funcao/conexao.php");

        $CPF = $_SESSION["CPF"];

        $PDO = CriarConexao();

        $CmdSQL = "SELECT TipoUsuario  FROM usuario WHERE CPF = :CPF";
        $Resultado = $PDO->prepare($CmdSQL);
        $Resultado->bindParam(':CPF',$CPF);
        $Resultado->execute();

        $Dados = $Resultado->fetch(PDO::FETCH_ASSOC);

        if($Dados["TipoUsuario"] != "admin"):
            header("location: ../inicial/index.php");
            exit();
        endif;

        $ID = $_GET["id"];

        $CmdSQL = "SELECT * FROM vinho WHERE IDVinho = :ID";
        $Resultado = $PDO->prepare($CmdSQL);
        $Resultado->bindParam(':ID',$ID);
        $Resultado->execute();

        $DadosVinho = $Resultado->fetch(PDO::FETCH_ASSOC); 
    else:
        header("location: ../inicial/index.php");
        exit();
    endif;

    $ID = $_GET["id"];

    $CmdSQL = "DELETE FROM vinho WHERE IDVinho = :ID";

    $Resultado = $PDO->prepare($CmdSQL);
    $Resultado->bindParam(":ID",$ID);
    $Resultado->execute();

    header("location: pagCatalogoVinho.php");
    
?>