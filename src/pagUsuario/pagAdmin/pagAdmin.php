<?php
    session_start();

    if(isset($_SESSION["logado"])):
        require_once("../../funcao/conexao.php");

        $CPF = $_SESSION["CPF"];

        $PDO = CriarConexao();

        $CmdSQL = "SELECT * FROM usuario WHERE CPF = :CPF";
        $Consulta = $PDO->prepare($CmdSQL);
        $Consulta->bindParam(":CPF",$CPF);
        $Consulta->execute();

        $Dados = $Consulta->fetch(PDO::FETCH_ASSOC);
    else:
        header("location: ../../inicial/index.php");
    endif;
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:wght@300&family=Oswald&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/stylePagUsuario.css">
    <link rel="shortcut icon" href="../../assets/site/Brasao_Duarte.png">
    <link rel="stylesheet" href="../../css/styleScrollToTop.scss">
</head>
<body class="jarallax border-bottom border-light" data-jarallax data-speed="0.2">
    
    <nav class="navbar navbar-expand-lg navbar-dark border-bottom border-top border-light" style="background-color: #800000;">
        <a class="navbar-brand" href="../../inicial/index.php#telaInicial"><img src="../../assets/site/Brasao_Duarte.png" height="40" width="40"> Adega da Família Duarte</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="../../inicial/index.php#sobreNos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text mx-2" viewBox="0 0 16 16">
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                            <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        Sobre nós
                    </a>
                </li>
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="../../vinho/pagCatalogoVinho.php"><img src="https://img.icons8.com/ios-filled/50/ffffff/wine-glass.png" class="mx-2" height="16" width="16"/>Catálogo de Vinhos</a>
                </li>
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="../../inicial/index.php#FAQ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle-fill mx-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                        </svg>
                        F.A.Q
                    </a>
                </li>
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="../../inicial/index.php#contatos">
                        <img src="https://img.icons8.com/android/24/ffffff/contacts.png" height="16" width="16" class="mx-2"/>
                        Contatos
                    </a>
                </li>
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="<?php echo 'pagAdmin.php'?>">
                        <svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-person-circle mx-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                        </svg> 
                        <?php
                            echo "Bem vindo(a) ".$Dados["NomeCompletoUsuario"];
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <section class="my-5">
        <div class="container">
            <div class="card border border-light" id="dadosPessoais">
                <div class="card-header text-center border border-light">
                    <h1 class="display-4">Perfil</h1>
                </div>
                <div class="card-body border border-light">
                    <?php 
                        require_once("../../funcao/Idade.php");
                        echo "<h3>Nome completo: ".$Dados["NomeCompletoUsuario"]."</h3>";
                        echo "<h3>CPF: ".$Dados["CPF"]."</h3>";
                        echo "<h3>Idade: ".CalcularIdade($Dados["DtNascimento"])."</h3>";
                        echo "<h3>Email: ".$Dados["Email"]."</h3>";
                        echo "<h3>Telefone: ".$Dados["Tel"]."</h3>";
                    ?>
                </div>
                <div class="card-footer text-center border border-light">
                    <a class="btn btn-outline-light mx-auto col-4 rounded-pill" href="../pagEditarPerfil.php">Editar perfil</a>
                    <a class="btn btn-outline-light mx-auto col-3 rounded-pill" href="../../funcao/logout.php">Sair</a>
                    <a class="btn btn-outline-light mx-auto col-4 rounded-pill" href="../excluirConta.php">Excluir conta</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="card border border-light text-center" id="edicaoUsuario">
                <div class="card-header text-center border border-light">
                    <h1 class="display-4">Usuários cadastrados</h1>
                </div>
                <div class="card-body border border-light text-center">
                    <?php
                        require_once("../../funcao/conexao.php");
                        
                        $PDO = CriarConexao();

                        $CmdSQL = "SELECT NomeCompletoUsuario, CPF FROM usuario";
                    ?>
                    <form action="usuario/editarUsuario.php" method="POST" id="formEdicaoUsuario">
                        <div>
                            <div>
                                <div class="form-inline">
                                    <label class="mx-auto"><h3>Usuários </h3></label>
                                    <select name="edicaoUsuarioUsuario" class="form-control rounded-pill col-6 mx-auto border border-dark">
                                        <?php foreach($PDO->query($CmdSQL) as $DadoUsuario):?>
                                        <option value="<?php echo $DadoUsuario[1];?>"><?php echo $DadoUsuario[0]; ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer text-center border border-light">
                        <input type="submit" name="btnConcederPermissao" class="btn btn-outline-light mx-auto col-4 rounded-pill" value="Conceder permissão" onclick="return confirmarDecisao()">
                        <input type="submit" name="btnRetirarPermissao" class="btn btn-outline-light mx-auto col-4 rounded-pill" value="Retirar permissão" onclick="return confirmarDecisao()">
                        <input type="submit" name="btnExcluirUsuario" class="btn btn-outline-light mx-auto col-3 rounded-pill" value="Excluir usuário" onclick="return confirmarDecisao()">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section>
        <div class="container">
            <div class="card border border-light text-center" id="cadastroVinho">
                <div class="card-header border border-light">
                    <h1 class="display-4">Cadastrar vinho</h1>
                </div>
                <div class="card-body border border-light">
                    <?php if(isset($_GET['listaErroVinho'])):?>

                    <div class="container mb-4">
                        <ul style="list-style: none;" class="border border-light rounded-pill">
                            <h4><?php echo $_GET['listaErroVinho'];?></h4>
                        </ul>
                    </div>

                    <?php endif;?>

                    <form action="../../vinho/cadastrarVinho.php" enctype="multipart/form-data" method="POST">
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Nome </h3></label>
                            <input type="text" name="cadastroVinhoNome" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" required placeholder="Insira o nome do vinho">
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Tipo </h3></label>
                            <input type="text" name="cadastroVinhoTipo" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" required placeholder="Insira o tipo de vinho">
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Uva </h3></label>
                            <input type="text" name="cadastroVinhoUva" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" required placeholder="Insira a uva usada">
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Volume (mL ) </h3></label>
                            <input type="text" name="cadastroVinhoVolume" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" required placeholder="Insira qual o volume do vinho">
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Safra </h3></label>
                            <input type="text" name="cadastroVinhoAnoComposicao" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" minlength="4" maxlength="4" required placeholder="Insira o ano de produção do vinho" pattern="[0-9]{4}">
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Origem </h3></label>
                            <input type="text" name="cadastroVinhoOrigem" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" required placeholder="Insira o país de origem">
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Região </h3></label>
                            <input type="text" name="cadastroVinhoRegiao" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" required placeholder="Insira a região de origem">
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Vinícola </h3></label>
                            <input type="text" name="cadastroVinhoVinicola" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" required placeholder="Insira a produtora de origem">
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Teor alcoólico </h3></label>
                            <input type="text" name="cadastroVinhoTeorAlcoolico" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" required placeholder="Ex.: 19.45" pattern="[\d,.]*">
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Temperatura de consumo </h3></label>
                            <input type="text" name="cadastroVinhoTempConsumo" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" required placeholder="Insira a temperatura de consumo do vinho">
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h3>Preço (R$) </h3></label>
                            <input type="text" name="cadastroVinhoPreco" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" required placeholder="Ex.: 120.25" pattern="[\d,.]*">
                        </div>
                        <div class="file-field row">
                            <input type="file" class="rounded-pill ml-auto col-9" name="cadastroVinhoImg" onchange="previewImagem()" required><br><br>
			                <img style="width: 350px;" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" name="preView" class="rounded border border-dark mx-auto">
                        </div>
                        
                </div>
                <div class="card-footer border border-light">
                    <input type="submit" name="btnCadastrarVinho" class="btn btn-outline-light mx-auto col-6 rounded-pill" value="Cadastrar">
                    </form>
                </div>
            </div>
            <br>
        </div>
    </section>
    <section id="footer" class="jarallax border-bottom border-light" data-jarallax data-speed="0.2" style="background-color: white;">
        <div class="container" style="color: #800000;">
            <div class="row">
                <div class="col-4 mx-auto">
                    <img src="../../assets/site/Brasao_Duarte_Full.png" height="320" width="256" class="mx-auto">
                </div>
                <div class="my-4 linha-vertical"></div>
                <div class="col-6 my-4 mx-auto">
                    <h1>Adega da Família Duarte</h1>
                    <h3>A tradição máxima em forma de vinhos</h3>
                    <hr color="#800000">
                    <h4>Siga-nos:</h4>
                    <div class="row">
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800000" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800000" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg>
                        </a>
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800000" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                        </a>
                        <a href="#" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800000" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212h-2.4s.03-6.547 0-7.225h2.4v1.023a5.54 5.54 0 0 0-.016.025h.016v-.025c.32-.493.89-1.193 2.165-1.193 1.58 0 2.764 1.033 2.764 3.252v4.143h-2.4V9.529c0-.972-.348-1.634-1.217-1.634-.664 0-1.059.447-1.233.878-.063.154-.079.37-.079.586v4.035z"/>
                            </svg>
                        </a>
                    </div>
                    <br>
                    <h4>Mural do reconhecimento:</h4>
                    <div class="container rounded" style="border: 2px solid #800000;">
                        <div class="row">
                            <a href="https://icons8.com/icon/8336/wine-glass" class="mx-auto" style="color: #800000;">Ícone Wine Glass feito por Icons8</a>
                            <a href="https://icons8.com/icon/3222/contacts" class="mx-auto" style="color: #800000;">Ícone Contacts feito por Icons8</a>
                            <a href="https://ih1.redbubble.net/image.232892385.2060/ap,550x550,12x16,1,transparent,t.u1.png" style="color: #800000;" class="mx-auto">Rodapé brasão Duarte</a>
                        </div>
                        <div class="row">
                            <a href="https://p4.wallpaperbetter.com/wallpaper/232/857/216/greens-wine-bottle-cheese-wallpaper-preview.jpg" style="color: #800000;" class="mx-auto">Fundo com taças</a>
                            <a href="https://www.origemdosobrenome.com.br/wp-content/gallery/brasao-duarte/brasao-sobrenome-familia-duarte-2.jpg" class="mx-auto" style="color: #800000;">Logo brasão Duarte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a class="top-link hide fade" href="" id="js-top">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800000" class="bi bi-chevron-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
        </svg>
    </a>

    <script src="https://unpkg.com/jarallax@1/dist/jarallax.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script>
		function previewImagem(){
			var imagem = document.querySelector('input[name=cadastroVinhoImg]').files[0];
			var preview = document.querySelector('img[name=preView]');
				
			var reader = new FileReader();
				
			reader.onloadend = function () {
				preview.src = reader.result;
			}
				
			if(imagem){
				reader.readAsDataURL(imagem);
			}else{
				preview.src = "";
			}
        }
        
        function confirmarDecisao(){
            if(confirm("Você realmente deseja fazer isto?")){
                document.querySelector("#formEdicaoUsuario").submit();
            }else{
                return false;
            }
        }
    </script>
    <script src="../../funcao/scrollToTop.js"></script>
</body>
</html>