<?php
    session_start();

    if(isset($_SESSION["logado"])):
        require_once("../funcao/conexao.php");
        require_once("../funcao/validacao.php");
        require_once("../funcao/Idade.php");

        $CPF = $_SESSION["CPF"];

        $PDO = CriarConexao();

        $CmdSQL = "SELECT * FROM usuario WHERE CPF = :CPF";
        $Consulta = $PDO->prepare($CmdSQL);
        $Consulta->bindParam(":CPF", $CPF);
        $Consulta->execute();

        $Dados = $Consulta->fetch(PDO::FETCH_ASSOC);
    else:
        header("location: ../inicial/index.php");
        exit();
    endif;

    if($_POST["btnSalvar"]):
        $ListaErro = "";

        $NomeCompleto = $_POST["edicaoPerfilNomeCompleto"];
        $Apelido = $_POST["edicaoPerfilApelido"];
        
        $Tel = strval($_POST["edicaoPerfilTel"]);

        $Email = $_POST["edicaoPerfilEmail"];
        if($Email != $Dados["Email"]):
            if(EhMesmoEmail($Email, $PDO) != 0):
                $ListaErro .= "<li>Email já existente</li>";
                header("location: pagEditarPerfil.php?listaErroPerfil=".$ListaErro."#edicaoPerfil");
                exit();
            endif;
        endif;


        $CPFEdicao = $_POST["edicaoPerfilCPF"];
        if($CPF != $CPFEdicao):
            if(EhMesmoCPF($CPFEdicao, $PDO) == 0):
                if(EhCPFValido($CPFEdicao) == false):
                    $ListaErro .= "<li>CPF inválido</li>";
                    header("location: pagEditarPerfil.php?listaErroPerfil=".$ListaErro."#edicaoPerfil");
                    exit();
                endif;
            else:
                $ListaErro .= "<li>CPF já existente</li>";
                header("location: pagEditarPerfil.php?listaErroPerfil=".$ListaErro."#edicaoPerfil");
                exit();
            endif;
        else:
            $CPFEdicao = $CPF;
        endif;

        $DtNascimento = $_POST["edicaoPerfilDtNascimento"];
        if(EhMaiorIdade($DtNascimento) == false):
            $ListaErro .= "<li>Consumo de bebidas alcoólicas somente é permitido para maiores de idade</li>";
            header("location: pagEditarPerfil.php?listaErroPerfil=".$ListaErro."#edicaoPerfil");
            exit();
        endif;

        $CmdSQL = "UPDATE usuario SET CPF = :CPFEdicao, NomeCompletoUsuario = :NomeCompleto, Email = :Email, Tel = :Tel, DtNascimento = :DtNascimento, CPFUsuario = :CPFEdicao, NomeUsuario = :Apelido WHERE CPF = :CPF";
        $Consulta = $PDO->prepare($CmdSQL);
        $Consulta->bindParam(':CPFEdicao', $CPFEdicao);
        $Consulta->bindParam(":NomeCompleto", $NomeCompleto);
        $Consulta->bindParam(":Email", $Email);
        $Consulta->bindParam(":Tel",$Tel);
        $Consulta->bindParam(":DtNascimento",$DtNascimento);
        $Consulta->bindParam(":CPF",$CPF);
        $Consulta->bindParam(":Apelido",$Apelido);
        $Consulta->execute();

        if($CPF != $CPFEdicao):
            header("location: ../funcao/logout.php");
            exit();
        endif;

        if($Dados["TipoUsuario"] == "comum"):
            header("location: pagEnofilo/pagEnofilo.php");
        else:
            header("location: pagAdmin/pagAdmin.php");
        endif;

    endif;

?>