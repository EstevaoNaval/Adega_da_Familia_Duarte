<?php
    session_start();
    require_once("../../../funcao/conexao.php");

    $PDO = CriarConexao();

    $CPFUsuario = $_POST["edicaoUsuarioUsuario"];

    if(isset($_POST["btnConcederPermissao"])):
        $CmdSQL = "UPDATE usuario SET TipoUsuario = 'admin' WHERE CPF = :CPFUsuario";
        $Resultado = $PDO->prepare($CmdSQL);
        $Resultado->bindParam(':CPFUsuario',$CPFUsuario);
        $Resultado->execute();

        header("location: ../../../inicial/index.php");
    elseif(isset($_POST["btnRetirarPermissao"])):
        $CmdSQL = "UPDATE usuario SET TipoUsuario = 'comum' WHERE CPF = :CPFUsuario";
        $Resultado = $PDO->prepare($CmdSQL);
        $Resultado->bindParam(':CPFUsuario',$CPFUsuario);
        $Resultado->execute();

        header("location: ../../../inicial/index.php");

    elseif(isset($_POST["btnExcluirUsuario"])):
        $CmdSQL = "DELETE FROM usuario WHERE CPF = :CPFUsuario";
        $Resultado = $PDO->prepare($CmdSQL);
        $Resultado->bindParam(':CPFUsuario',$CPFUsuario);
        $Resultado->execute();

        header("location: ../../../inicial/index.php");
    endif;
?>