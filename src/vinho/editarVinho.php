<?php
    session_start();

    if(isset($_SESSION["logado"])):
        require_once("../funcao/conexao.php");
        $PDO = CriarConexao();

        $ID = $_GET["id"];
        $EhVazio = $_GET["ehVazio"];

        $CmdSQL = "SELECT Imagem FROM vinho WHERE IDVinho = :ID";
        $Resultado = $PDO->prepare($CmdSQL);
        $Resultado->bindParam(":ID", $ID);
        $Resultado->execute();

        $DadoImgVinho = $Resultado->fetch(PDO::FETCH_ASSOC);

    else:
        header("location: ../inicial/index.php");
        exit();
    endif;

    $Nome = $_POST["edicaoVinhoNome"];
    $Tipo = $_POST["edicaoVinhoTipo"];
    $Uva = $_POST["edicaoVinhoUva"];
    $Volume = $_POST["edicaoVinhoVolume"];
    $AnoComposicao = $_POST["edicaoVinhoAnoComposicao"];
    $Origem = $_POST["edicaoVinhoOrigem"];
    $Regiao = $_POST["edicaoVinhoRegiao"];
    $Vinicola = $_POST["edicaoVinhoVinicola"];
    $TeorAlcoolico = floatval(str_replace(',','.', $_POST["edicaoVinhoTeorAlcoolico"]));
    $Preco = floatval(str_replace(',','.', $_POST["edicaoVinhoPreco"]));
    $TempConsumo = $_POST["edicaoVinhoTempConsumo"];

    if($EhVazio == "sim"):
        $CaminhoImagem = $DadoImgVinho["Imagem"];
    elseif($EhVazio == "nao"):
        $Imagem = $_FILES["edicaoVinhoImg"];
        $Extensao = pathinfo($Imagem['name'], PATHINFO_EXTENSION);

        if($Extensao != "png" && $Extensao != "jpg" && $Extensao != "jpeg" && $Extensao != "svg" && $Extensao != "webp" && $Extensao != "bmp" && $Extensao != "tiff" && $Extensao != "gif"):
            header("location: pagEditarVinho.php?listaErroVinho=".urlencode("<li>Extensão não suportada</li>")."&id=".$ID."#formEdicaoVinho");
            exit();
        endif;

        // Diretorio das imagens
        $DirPasta = "../assets/vinho/";

        // Se a pasta não existir, ele cria.
        if(!file_exists($DirPasta)):
            mkdir($DirPasta);
        endif;

        $CaminhoImagem = $DirPasta.$Imagem['name'];

        move_uploaded_file($Imagem["tmp_name"], $CaminhoImagem);
    endif;

    $CmdSQL = "UPDATE vinho SET NomeCompletoVinho = :Nome, TipoVinho = :Tipo, Origem = :Origem, AnoComposicao = :AnoComposicao, TeorAlcoolico = :TeorAlcoolico, Volume = :Volume, Preco = :Preco, Imagem = :CaminhoImagem, Regiao = :Regiao, Vinicola = :Vinicola, Uva = :Uva, TempConsumo = :TempConsumo WHERE IDVinho = :ID";
    $Resultado = $PDO->prepare($CmdSQL);
    $Resultado->bindParam(":Nome",$Nome);
    $Resultado->bindParam(":Tipo",$Tipo);
    $Resultado->bindParam(":Origem",$Origem);
    $Resultado->bindParam(":AnoComposicao",$AnoComposicao);
    $Resultado->bindParam(":TeorAlcoolico",$TeorAlcoolico,PDO::PARAM_STR);
    $Resultado->bindParam(":Volume",$Volume);
    $Resultado->bindParam(":Preco",$Preco,PDO::PARAM_STR);
    $Resultado->bindParam(":CaminhoImagem",$CaminhoImagem);
    $Resultado->bindParam(":Regiao",$Regiao);
    $Resultado->bindParam(":Vinicola",$Vinicola);
    $Resultado->bindParam(":Uva",$Uva);
    $Resultado->bindParam(":TempConsumo",$TempConsumo);
    $Resultado->bindParam(":ID",$ID);
    $Resultado->execute();

    header("location: pagCatalogoVinho.php");
?>