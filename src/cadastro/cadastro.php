<?php
    session_start();

    if(isset($_POST["btnCadastrar"])):
        require_once("../funcao/conexao.php");
        require_once("../funcao/Idade.php");
        require_once("../funcao/validacao.php");

        $PDO = CriarConexao();
    
        $ListaErro = "";

        $NomeCompleto = $_POST["cadastroNomeCompleto"];
        
        $Tel = strval($_POST["cadastroTel"]);

        $Email = $_POST["cadastroEmail"];
        if(EhMesmoEmail($Email, $PDO) != 0):
            $ListaErro .= "<li>Email já existente</li>";
            header("location: ../inicial/index.php?listaErroCadastro=".$ListaErro."#cadastro");
            exit();
        endif;    

        $Senha = $_POST["cadastroSenha"];
        $ConfirmaSenha = $_POST["cadastroConfirmaSenha"];

        if($Senha === $ConfirmaSenha):
            $Senha = password_hash($Senha, PASSWORD_DEFAULT);
        else:
            $ListaErro .= "<li>As senhas não coincidem</li>";
            header("location: ../inicial/index.php?listaErroCadastro=".$ListaErro."#cadastro");
            exit();
        endif;

        $CPF = $_POST["cadastroCPF"];
        if(EhMesmoCPF($CPF, $PDO) == 0):
            if(EhCPFValido($CPF) == false):
                $ListaErro .= "<li>CPF inválido</li>";
                header("location: ../inicial/index.php?listaErroCadastro=".$ListaErro."#cadastro");
                exit();
            endif;
        else:
            $ListaErro .= "<li>CPF já existente</li>";
            header("location: ../inicial/index.php?listaErroCadastro=".$ListaErro."#cadastro");
            exit();
        endif;

        $DtNascimento = $_POST["cadastroDtNascimento"];
        if(EhMaiorIdade($DtNascimento) == false):
            $ListaErro .= "<li>Consumo de bebidas alcoólicas somente é permitido para maiores de idade</li>";
            header("location: ../inicial/index.php?listaErroCadastro=".$ListaErro."#cadastro");
            exit();
        endif;

        $CmdSQL = "INSERT INTO usuario (CPF,NomeCompletoUsuario,Email,Tel,Senha,TipoUsuario,DtNascimento,CPFUsuario) VALUES (:CPF, :NomeCompleto, :Email, :Tel, :Senha, 'comum', :DtNascimento, :CPF)";

        $Prepare = $PDO->prepare($CmdSQL);
        $Prepare->bindParam(':CPF',$CPF);
        $Prepare->bindParam(':NomeCompleto',$NomeCompleto);
        $Prepare->bindParam(':Email',$Email);
        $Prepare->bindParam(':Tel',$Tel);
        $Prepare->bindParam(':Senha',$Senha);
        $Prepare->bindParam(':DtNascimento',$DtNascimento);

        $Resultado = $Prepare->execute();

        header("location: ../inicial/index.php#entrar");
    endif;
?>