<?php
    session_start();

    if(isset($_POST["btnAcessar"])):
        require_once("../funcao/conexao.php");
        
        $PDO = CriarConexao();
        $ListaErros = "";

        $Email = $_POST["loginEmail"];
        $Senha = $_POST["loginSenha"];

        $CmdSQL = "SELECT Email FROM usuario WHERE Email = :Email";

        $Consulta = $PDO->prepare($CmdSQL);
        $Consulta->bindParam(":Email",$Email);
        $Consulta->execute();

        if($Consulta->rowCount() > 0):
            $CmdSQL = "SELECT Senha FROM usuario WHERE Email = :Email"; 

            $Consulta = $PDO->prepare($CmdSQL);
            $Consulta->bindParam(":Email",$Email);
            $Consulta->execute();

            $Hash = $Consulta->fetch(PDO::FETCH_ASSOC);

            if(password_verify($Senha, $Hash['Senha'])):
                $CmdSQL = "SELECT CPF, TipoUsuario FROM usuario WHERE Email = :Email";

                $Consulta = $PDO->prepare($CmdSQL);
                $Consulta->bindParam(":Email", $Email);
                $Consulta->execute();

                $Dados = $Consulta->fetch(PDO::FETCH_ASSOC);

                $_SESSION["logado"] = true;
                $_SESSION["CPF"] = $Dados["CPF"];

                if($Dados["TipoUsuario"] == "comum"):
                    header("location: ../pagUsuario/pagEnofilo/pagEnofilo.php");
                else:
                    header("location: ../pagUsuario/pagAdmin/pagAdmin.php");
                endif;

            else:
                $ListaErros = "<li>Senha incorreta</li>";
                header("location: ../inicial/index.php?listaErroLogin=".$ListaErros."#entrar");
                exit();
            endif;
        else:
            $ListaErros = "<li>Email incorreto ou inexistente</li>";
            header("location: ../inicial/index.php?listaErroLogin=".$ListaErros."#entrar");
            exit();
        endif;
    endif;
?>