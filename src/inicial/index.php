<?php
    session_start();

    if(isset($_SESSION["logado"])):
        require_once("../funcao/conexao.php");

        $CPF = $_SESSION["CPF"];

        $PDO = CriarConexao();

        $CmdSQL = "SELECT NomeUsuario, TipoUsuario FROM usuario WHERE CPF = :CPF";
        $Consulta = $PDO->prepare($CmdSQL);
        $Consulta->bindParam(':CPF',$CPF);
        $Consulta->execute();

        $Dados = $Consulta->fetch(PDO::FETCH_ASSOC);
    endif;
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adega da Família Duarte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:wght@300&family=Oswald&family=Roboto&family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styleIndex.css">
    <link rel="shortcut icon" href="../assets/site/Brasao_Duarte.png">
    <link rel="stylesheet" href="../css/styleScrollToTop.scss">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark border-bottom border-top border-light" style="background-color: #800000;">
        <a class="navbar-brand" href="#telaInicial"><img src="../assets/site/Brasao_Duarte.png" height="40" width="40"> Adega da Família Duarte</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="#sobreNos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text mx-2" viewBox="0 0 16 16">
                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                            <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        Sobre nós
                    </a>
                </li>
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="../vinho/pagCatalogoVinho.php"><img src="https://img.icons8.com/ios-filled/50/ffffff/wine-glass.png" class="mx-2" height="16" width="16"/>Catálogo de Vinhos</a>
                </li>
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="#FAQ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle-fill mx-2" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z"/>
                        </svg>
                        F.A.Q
                    </a>
                </li>
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="#contatos">
                        <img src="https://img.icons8.com/android/24/ffffff/contacts.png" height="16px" width="16" class="mx-2"/>
                        Contatos
                    </a>
                </li>
                <?php
                    if(isset($_SESSION["logado"])):
                ?>
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="<?php if($Dados["TipoUsuario"] == "comum"): echo '../pagUsuario/pagEnofilo/pagEnofilo.php'; else: echo '../pagUsuario/pagAdmin/pagAdmin.php'; endif;?>">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle mx-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                        </svg> 
                        <?php
                            echo "Bem vindo(a) ".$Dados["NomeUsuario"];
                        ?>
                    </a>
                </li>
                <?php
                    else:
                ?>
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="#entrar">
                        <svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-person-fill mx-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg> 
                        Entrar
                    </a>
                </li>
                <li class="nav-item active border border-light mx-1 mb-1 rounded-pill">
                    <a class="nav-link" href="#cadastro">
                        <svg width="16" height="16" viewBox="0 0 16 16" class="bi bi-person-plus-fill mx-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        Cadastrar
                    </a>
                </li>
                <?php
                    endif;
                ?>
            </ul>
        </div>

        <a class="nav-link ml-auto" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-basket3-fill" viewBox="0 0 16 16">
                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426L.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z"/>
            </svg>
        </a>
    </nav>

    <section class="text-white jarallax border-bottom border-light" id="telaInicial" data-jarallax data-speed="0.2">
        <div class="container anime" id="textoTelaInicial">
            <h1 class="display-4">Adega da Família Duarte</h1>
            <p class="Lead">A tradição máxima em forma de vinhos</p>
            <a href="index.php#cadastro" class="btn btn-outline-light rounded-pill">Seja nosso associado</a>
        </div>
    </section>
    
    <section class="jarallax border-bottom border-light" id="sobreNos" data-jarallax data-speed="0.2">
        <div class="container text-white text-center anime">
            <header>
                <h1 class="display-4">Sobre nós</h1>
            </header>
            <h4>A adega da Família Duarte é uma das Adegas de vinhos mais tradicionais do Brasil. Nós temos orgulho dos vinhos da mais alta qualidade que guardamos. Barris passados de geração em geração e que armazenam a quintessência de nossa família, isto é, nossos vinhos. Nossos antepassados espanhóis e portugueses tiveram o enorme cuidado no trato de vinhos, guardando estes em barricas localizadas em nossas instalações. Se há um local onde você pode encontrar vinhos de qualidade, este local é aqui.</h4>
            <a href="index.php#cadastro" class="btn btn-outline-light rounded-pill my-4">Seja nosso associado</a>
        </div>
    </section>


    <section id="loginCadastro" class="jarallax border-bottom border-light" data-jarallax data-speed="0.2">
        <br><br>
        <div class="container text-center rounded">
            <div class="card border border-light anime" id="entrar">
                <div class="card-header border border-light">
                    <h1 class="display-4">Entrar</h1>
                    <h3>Se você já é nosso associado, acesse nossos serviços por aqui.</h3>
                </div>
                <div class="card-body border border-light">
                    <?php if(isset($_GET['listaErroLogin'])):?>

                    <div class="container">
                        <ul style="list-style: none;" class="border border-light rounded-pill">
                            <h4><?php echo $_GET['listaErroLogin'];?></h4>
                        </ul>
                    </div>

                    <?php endif;?>
                    <div class="container">
                        <form action="../login/login.php" method="POST">
                            <div class="form-group">
                                <div class="row">
                                    <label class="mx-auto col-lg-2 col-md-2 col-sm-12 mb-4"><h4>Email </h4></label>
                                    <input type="email" name="loginEmail" class="form-control mx-auto col-lg-3 col-md-3 col-sm-8 rounded-pill mb-4 border border-dark" placeholder="Ex.: exemplo@exemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                    
                                    <label class="mx-auto col-lg-2 col-md-2 col-sm-12 mb-4"><h4>Senha </h4></label>
                                    <input type="password" name="loginSenha" class="form-control mx-auto col-lg-3 col-md-3 col-sm-8 rounded-pill mb-4 border border-dark" placeholder="Insira sua senha" required>

                                    <input type="submit" value="Acessar" class="btn btn-outline-light mx-auto col-lg-1 col-md-1 col-sm-8 rounded-pill mb-4" name="btnAcessar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="container text-center rounded">
            <div class="card border border-light anime" id="cadastro">
                <div class="card-header border border-light">
                    <h1 class="display-4">
                        Cadastrar
                    </h1>
                    <h3>Ainda não é cadastrado? O que está esperando? Seja nosso associado!</h3>
                </div>
                <div class="card-body border border-light">
                    <?php if(isset($_GET['listaErroCadastro'])):?>

                    <div class="container">
                        <ul style="list-style: none;" class="border border-light rounded-pill">
                            <h4><?php echo $_GET['listaErroCadastro'];?></h4>
                        </ul>
                    </div>

                    <?php endif;?>
                    
                    <form action="../cadastro/cadastro.php" method="POST">
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h4>Nome completo </h4></label>
                            <input type="text" name="cadastroNomeCompleto" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" placeholder="Ex.: João da Silva Pinto" required>
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h4>Apelido </h4></label>
                            <input type="text" name="cadastroApelido" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" placeholder="Digite apenas letras e números" maxlength="12" required>
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h4>Telefone </h4></label>
                            <input type="number" name="cadastroTel" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" placeholder="DDD + Telefone" required>
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h4>Email </h4></label>
                            <input type="email" name="cadastroEmail" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" placeholder="Ex.: exemplo@exemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" minlength="4" required>
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h4>Senha </h4></label>
                            <input type="password" name="cadastroSenha" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" placeholder="Insiria uma senha forte" required>
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h4>Confirmar senha </h4></label>
                            <input type="password" name="cadastroConfirmaSenha" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" placeholder="Repita sua senha" required>
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h4>CPF </h4></label>
                            <input type="text" name="cadastroCPF" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" placeholder="Insira somente números" pattern="[0-9]{11}" required>
                        </div>
                        <div class="form-group mx-auto row">
                            <label class="col-lg-4 col-md-4 col-sm-12 ml-auto"><h4>Data de nascimento </h4></label>
                            <input type="date" name="cadastroDtNascimento" class="form-control col-lg-4 col-md-4 col-sm-12 rounded-pill mr-auto border border-dark" pattern="[0-9]{4}\-[0-9]{2}\-[0-9]{2}" required>
                        </div>

                </div>
                <div class="card-footer border border-light">
                        <div class="form-group mx-auto row">
                            <input type="submit" value="Cadastrar" class="btn btn-outline-light col-lg-6 col-md-6 col-sm-12 rounded-pill mx-auto" name="btnCadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br>
    </section>

    <section id="FAQ" class="jarallax border-bottom border-light" data-jarallax data-speed="0.2">
        <div class="container text-center text-white anime">
            <header>
                <h1 class="display-4 my-auto">Perguntas frequentes</h1>
            </header>
            <br><br>

            <div class="accordion mb-5" id="accordionFAQ" style="color: #800000;">
                <div class="card">
                    <div class="card-header" id="headingQuest01">
                    <h5 class="mb-0">
                        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseQuest01" aria-expanded="true" aria-controls="collapseOne" style="color: #800000;">
                            <h4>1. Todos os vinhos do catálogo da Família Duarte estão no site?</h4>
                        </button>
                    </h5>
                    </div>

                    <div id="collapseQuest01" class="collapse" aria-labelledby="headingQuest01" data-parent="#accordionFAQ">
                    <div class="card-body">
                        <h5>Inicialmente, não. Entretanto, estamos trabalhando ao máximo para migrar todos os nossos vinhos para o nosso sistema online. Em breve, você poderá aproveitar todos os vinhos de nossas barricas!</h5>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingQuest02">
                    <h5 class="mb-0">
                        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseQuest02" aria-expanded="false" aria-controls="collapseQuest02" style="color: #800000;">
                            <h4>2. A Adega da Família Duarte possui um endereço físico?<h4>
                        </button>
                    </h5>
                    </div>
                    <div id="collapseQuest02" class="collapse" aria-labelledby="headingQuest02" data-parent="#accordionFAQ">
                    <div class="card-body">
                        <h5>Sim! A Adega da Família Duarte possui pontos comerciais no Rio de Janeiro, São Paulo e Rio Grande do Sul. Além do centro onde guardamos nossas barricas no Rio Grande do Sul.<h5><br>
                        <h5><strong>Localizações:</strong></h5><br>
                        <h5><strong>São Paulo:</strong> Rua Nossa Senhora da Clemência, nº 25, Higienópolis, São Paulo/SP</h5>
                        <h5>Avenida Paulista, nº 572, Bela Vista, São Paulo/SP</h5>
                        <h5>Rua dos Mineiros, nº 973, Itaim Bibi, São Paulo/SP</h5><br>
                        <h5><strong>Rio de Janeiro:</strong> Avenida Atlântica, nº 248, Copacabana, Rio de Janeiro/RJ</h5>
                        <h5>Avenida Rio Branco, nº 9221, Centro, Rio de Janeiro/RJ</h5>
                        <h5>Rua Padre Aloíso Paiva, nº 1242, Urca, Rio de Janeiro/RJ</h5><br>
                        <h5><strong>Rio Grande do Sul:</strong> Rua das Labaredas, nº 842, Porto Alegre, Porto Alegre/RS</h5><br>
                        <h5><strong>Centro de armazenamento:</strong> Estrada dos vinhos, nº 720, Caxias do Sul, Caxias do Sul/RS</h5><br>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingQuest03">
                    <h5 class="mb-0">
                        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseQuest03" aria-expanded="false" aria-controls="collapseQuest03" style="color: #800000;">
                            <h4>3. Os vinhos premium podem ser comprados aqui?<h4>
                        </button>
                    </h5>
                    </div>
                    <div id="collapseQuest03" class="collapse" aria-labelledby="headingQuest03" data-parent="#accordionFAQ">
                    <div class="card-body">
                        <h5>Por conta da raridade, antiguidade e para segurança de certos vinhos, leilões online serão feitos para arremata-los. No site, você poderá ver avisos de quando e onde estes leilões acontecerão. Excepcionalmente, vinhos muito mais raros serão arrematados via leilões presenciais. Convites para estes encontros presenciais serão enviados para associados do site com certo nível de fidelidade.<h5>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingQuest04">
                    <h5 class="mb-0">
                        <button class="btn" type="button" data-toggle="collapse" data-target="#collapseQuest04" aria-expanded="false" aria-controls="collapseQuest04" style="color: #800000;">
                            <h4>4. Como escolher um vinho?</h4>
                        </button>
                    </h5>
                    </div>
                    <div id="collapseQuest04" class="collapse" aria-labelledby="headingQuest04" data-parent="#accordionFAQ">
                    <div class="card-body">
                        <h5>Você pode escolher um vinho indo para o catálogo e vendo cada tipo de vinho, bem como onde foram feitos, seu teor alcoólico, temperatura de consumo, etc.<h5>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingQuest05">
                        <h5 class="mb-0">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapseQuest05" aria-expanded="false" aria-controls="collapseQuest05" style="color: #800000;">
                                <h4>5. Como comprar?</h4>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseQuest05" class="collapse" aria-labelledby="headingQuest05" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <h5>Comprar no site da Adega da Família Duarte é algo muito simples.</h5><br>
                            <h5>Basta o usuário ir ao catálogo de vinhos. Após isto, o usuário clica no botão de comprar embaixo de cada cartão com os dados do vinho, e este será enviado para o processo de compra.</h5><br>
                            <h5>Se estiver em dúvida e quiser uma recomendação, o usuário pode nos enviar um email para <a href="mailto:adegafamiliaduarte@gmail.com" style="color: #800000;">adegafamiliaduarte@gmail.com</a>, um telefonema para +55 (021) 3433-9973 ou um whatsapp para +55 (021) 98733-0456.</h5>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingQuest06">
                        <h5 class="mb-0">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapseQuest06" aria-expanded="false" aria-controls="collapseQuest06" style="color: #800000;">
                                <h4>6. Que formas de pagamento o site aceita?</h4>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseQuest06" class="collapse" aria-labelledby="headingQuest06" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <h5>Nossa loja virtual aceita pagamentos via boleto, e cartões de crédito das bandeiras Visa, Mastercard e Elo.</h5>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingQuest07">
                        <h5 class="mb-0">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapseQuest07" aria-expanded="false" aria-controls="collapseQuest07" style="color: #800000;">
                                <h4>7. E se eu tiver dúvidas sobre a minha compra?</h4>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseQuest07" class="collapse" aria-labelledby="headingQuest07" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <h5>Estaremos prontos a respondê-la. Basta enviar um e-mail para <a href="mailto:adegafamiliaduarte@gmail.com" style="color: #800000;">adegafamiliaduarte@gmail.com</a>, um telefonema para +55 (021) 3433-9973 ou um whatsapp para +55 (021) 98733-0456. 
                            O período de atendimento é de segunda a sexta-feira entre 8:45h e 18h e sábados entre 9h e 15h. Não atendemos em feriados.</h5>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingQuest08">
                        <h5 class="mb-0">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapseQuest08" aria-expanded="false" aria-controls="collapseQuest08" style="color: #800000;">
                                <h4>8. Quais são as vantagens em me tornar um associado?</h4>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseQuest08" class="collapse" aria-labelledby="headingQuest08" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <h5>- Comprar, pela internet, os melhores vinhos pelo melhor preço.</h5><br>
                            <h5>- Participar de promoções exclusivas do site.</h5><br>
                            <h5>- Com um determinado tempo de fidelidade, ser convidado para leilões presenciais de vinhos raríssimos.</h5><br>
                            <h5>- Receber nossa newsletter por email, com novidades do site, eventos de vinho, degustações e jantares com produtores, promoções especiais e muito mais.</h5><br>
                            <h5>Mesmo se você já for nosso cliente, cadastre-se novamente para usufruir também de todas as vantagens do site.</h5>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingQuest09">
                        <h5 class="mb-0">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapseQuest09" aria-expanded="false" aria-controls="collapseQuest09" style="color: #800000;">
                                <h4>9. Eu gostaria de receber vinhos da Adega da Família Duarte em meu(s) restaurante(s)</h4>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseQuest09" class="collapse" aria-labelledby="headingQuest09" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <h5>Muitas redes de restaurantes optam pelo nosso serviço de vinhos. A nossa qualidade cria uma boa relação entre nós e estes restaurantes.</h5><br>
                            <h5>Você pode requerer nossos serviços e tirar quaisquer dúvidas sobre através do nosso email <a href="mailto:adegafamiliaduarte@gmail.com" style="color: #800000;">adegafamiliaduarte@gmail.com</a>.</h5>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingQuest10">
                        <h5 class="mb-0">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapseQuest10" aria-expanded="false" aria-controls="collapseQuest10" style="color: #800000;">
                                <h4>10. Outras dúvidas</h4>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseQuest10" class="collapse" aria-labelledby="headingQuest10" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <h5>Para quaisquer dúvidas, você pode enviar um e-mail para <a href="mailto:adegafamiliaduarte@gmail.com" style="color: #800000;">adegafamiliaduarte@gmail.com</a>, um telefonema para +55 (021) 3433-9973 ou um whatsapp para +55 (021) 98733-0456. 
                            O período de atendimento é de segunda a sexta-feira entre 8:45h e 18h e sábados entre 9h e 15h. Não atendemos em feriados.</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="contatos" class="jarallax border-bottom border-light" data-jarallax data-speed="0.2">
        <div class="container text-center text-white anime">
            <header>
                <h1 class="display-4 my-auto">Contatos</h1>
            </header>
            <br><br>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 rounded border border-light mx-auto">
                    <svg width="64" height="64" viewBox="0 0 16 16" class="bi bi-envelope-fill my-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                    </svg>
                    <h3>E-mail</h3>
                    <p>Tem alguma dúvida?</p>
                    <h4><a href="mailto:adegafamiliaduarte@gmail.com" class="text-white">adegafamiliaduarte@gmail.com</a></h4>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 rounded border border-light mx-auto">
                    <svg width="64" height="64" viewBox="0 0 16 16" class="bi bi-telephone-fill my-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
                    </svg>
                    <h3>Telefone</h3>
                    <p>Você pode ligar a qualquer hora</p>
                    <h4>Fixo: +55 (021) 3433-9973</h4>
                    <h4>WhatsApp: +55 (021) 98733-0456</h4>
                </div>
            </div>
        </div>
        <br><br>
    </section>
    <section id="footer" class="jarallax border-bottom border-dark" data-jarallax data-speed="0.2" style="background-color: white;">
        <div class="container" style="color: #800000;">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 mx-auto">
                    <img src="../assets/site/Brasao_Duarte_Full.png" height="320" width="256" class="mx-auto">
                </div>
                <div class="linha-vertical my-4"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 my-4 mx-auto">
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
                            <a href="https://s1.1zoom.me/b5050/244/Barrel_Wine_Grapes_Bottle_528771_1920x1080.jpg" style="color: #800000;" class="mx-auto">Tela inicial</a>
                            <a href="https://www.melcohit.com/UploadData/z_externalFile/magazine_mehit_life/10_MEHITS_LIFE.pdf" style="color: #800000;" class="mx-auto">Barris de vinho</a>
                            <a href="https://www.origemdosobrenome.com.br/wp-content/gallery/brasao-duarte/brasao-sobrenome-familia-duarte-2.jpg" class="mx-auto" style="color: #800000;">Logo brasão Duarte</a>
                            <a href="https://www.stonoticias.com.ar/control/archivos/2b(13).jpg" class="mx-auto" style="color: #800000;">Taças em grupo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a class="top-link hide fade" id="js-top">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800000" class="bi bi-chevron-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
        </svg>
    </a>

    <script src="https://unpkg.com/jarallax@1/dist/jarallax.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="../funcao/scrollToTop.js"></script>
    <script>
        $('.nav a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('href'),
                    targetOffset = $(id).offset().top;
                    
            $('html, body').animate({ 
                scrollTop: targetOffset - 100
            }, 500);
        });
    </script>
</body>
</html>