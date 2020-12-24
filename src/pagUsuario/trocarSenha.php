<?php
    session_start();

    if(isset($_SESSION["logado"])):
        require_once("../funcao/conexao.php");
        require_once("../funcao/validacao.php");

        $CPF = $_SESSION["CPF"];

        $PDO = CriarConexao();

        $CmdSQL = "SELECT TipoUsuario  FROM usuario WHERE CPF = :CPF";
        $Resultado = $PDO->prepare($CmdSQL);
        $Resultado->bindParam(':CPF', $CPF);
        $Resultado->execute(); 

        $Dados = $Resultado->fetch(PDO::FETCH_ASSOC);
    else:
        header("location: ../inicial/index.php");
        exit();
    endif;

    
    $ListaErro = "";

    $Senha = $_POST["editarPerfilSenha"];
    $ConfirmaSenha = $_POST["editarPerfilConfirmaSenha"];

    if($Senha === $ConfirmaSenha):
        $Senha = password_hash($Senha, PASSWORD_DEFAULT);
    else:
        $ListaErro .= "<li>As senhas não coincidem</li>";
        header("location: pagEditarPerfil.php?listaErroSenha=".$ListaErro."#trocaSenha");
        exit();
    endif;

    $CmdSQL = "UPDATE usuario SET Senha = :Senha WHERE CPF = :CPF";
    $Resultado = $PDO->prepare($CmdSQL);
    $Resultado->bindParam(':Senha',$Senha);
    $Resultado->bindParam(":CPF",$CPF);
    $Resultado->execute();

    if($Dados["TipoUsuario"] == "comum"):
        header("location: pagEnofilo/pagEnofilo.php");
    else:
        header("location: pagAdmin/pagAdmin.php");
    endif;
?>