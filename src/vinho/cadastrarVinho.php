<?php
    session_start();

    if(isset($_SESSION["logado"])):
        require_once("../funcao/conexao.php");
        $PDO = CriarConexao();
    else:
        header("location: ../inicial/index.php");
        exit();
    endif;

    $Nome = $_POST["cadastroVinhoNome"];
    $Tipo = $_POST["cadastroVinhoTipo"];
    $Uva =  $_POST["cadastroVinhoUva"];
    $Volume = $_POST["cadastroVinhoVolume"];
    $AnoComposicao =  $_POST["cadastroVinhoAnoComposicao"];
    $Origem = $_POST["cadastroVinhoOrigem"];
    $Regiao = $_POST["cadastroVinhoRegiao"];
    $Vinicola = $_POST["cadastroVinhoVinicola"];
    $TeorAlcoolico = floatval(str_replace(',','.', $_POST["cadastroVinhoTeorAlcoolico"]));
    $Preco = floatval(str_replace(',','.', $_POST["cadastroVinhoPreco"]));
    $TempConsumo = $_POST["cadastroVinhoTempConsumo"];
    $Imagem = $_FILES["cadastroVinhoImg"];

    $Extensao = pathinfo($Imagem['name'], PATHINFO_EXTENSION);

    if($Extensao != "png" && $Extensao != "jpg" && $Extensao != "jpeg" && $Extensao != "svg" && $Extensao != "webp" && $Extensao != "bmp" && $Extensao != "tiff" && $Extensao != "gif"):
        header("location: ../pagUsuario/pagAdmin/pagAdmin.php?listaErroVinho=".urlencode("<li>Extensão não suportada</li>")."#cadastroVinho");
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

    $CmdSQL = "INSERT INTO vinho(NomeCompletoVinho, TipoVinho, Origem, AnoComposicao, TeorAlcoolico, Volume, Preco, Imagem, Regiao, Vinicola, Uva, TempConsumo) VALUES(:Nome, :Tipo, :Origem, :AnoComposicao, :TeorAlcoolico, :Volume, :Preco, :CaminhoImagem, :Regiao, :Vinicola, :Uva, :TempConsumo)";
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
    $Resultado->execute();

    header("location: pagCatalogoVinho.php");
?>