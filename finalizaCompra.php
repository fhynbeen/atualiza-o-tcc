<?php
    require "CRUDCompra.php";
    $pk = $_GET['action'];
    $produto = $crud->mostrarDados($pk);

?>
<html>
<head>
    <link rel="stylesheet" href="semantic.css" type="text/css">
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
    <script type="text/javascript" src="semantic.js"></script>
    <title >Compraki</title>
    <style>
        #menuzinho a:hover{
            background-color: #ff6a00;
        }
        body{
        ;
        }
        h1{
            font-weight: 100;
            line-height: 1.1;
        }
    </style>
    <script src="assets/library/jquery.min.js"></script>
    <script src="../dist/components/visibility.js"></script>
    <script src="../dist/components/sidebar.js"></script>
    <script src="../dist/components/transition.js"></script>
    <script>
        $(document)
            .ready(function() {
                // fix menu when passed
                $('.masthead')
                    .visibility({
                        once: false,
                        onBottomPassed: function() {
                            $('.fixed.menu').transition('fade in');
                        },
                        onBottomPassedReverse: function() {
                            $('.fixed.menu').transition('fade out');
                        }
                    })
                ;
                // create sidebar and attach to menu open
                $('.ui.sidebar')
                    .sidebar('attach events', '.toc.item')
                ;
            })
        ;
    </script>
</head>
<body>
<!-- Page Contents -->
<br><br>
<div class="pusher" >
    <?php require "menuLogado.php" ?>

    <div class="ui last container">
        <div class="ui three steps">

            <div class="step">
                <a href="carrinho.php">
                    <div class="content">
                        <div class="title">Carrinho</div>
                        <div class="description">Revise seus Produtos</div>
                    </div>
                </a>
            </div>

            <div class="step">
                <a href="CadastroDados.php">
                    <div class="content">
                        <a href="cadastroDados.php"><div class="title">Cadastrar Dados</div></a>
                        <div class="description">Informaçoes de Entrega</div>
                    </div>
                </a>
            </div>
            <div class="active step">
                <a href="finalizaCompra.php">
                    <div class="content">
                        <div class="title">Finalizar Compra</div>
                        <div class="description">Revise suas Informações</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <form class="ui form" style="margin-top: 2%;margin-left: 17%;width: 65%;background-color: #e0e0e0;padding-left: 1%;
  padding-top: 1%;
  padding-right: 1%;
  padding-bottom: 1%;
  margin-bottom: 5%;">
    <?php foreach ($produto as $item):?>
        <h4 class="ui dividing header">Informações da Entrega</h4>
        <div class="two fields">
            <div class="field">
                <label>Nome</label>
                <i><?=$item['nome'] ?></i>
            </div>
            <div class="field">
                <label>Sobrenome</label>
                <i><?=$item['sobrenome'] ?></i>
            </div>
        </div>

        <div class="two fields">
            <div class="field">
                <label>Endereço de Cobrança</label>
                <i><?=$item['endereco'] ?><i>,</i></i>
            </div>
            <div class="field">
                <label>Número</label>
                <i><?=$item['numero'] ?></i>
            </div>
        </div>
        <div class="two fields">
            <div class="field">
                <label>Estado</label>
                <i><?=$item['estado'] ?><i>,</i></i>
            </div>
            <div class="field">
                <label>País</label>
                <i>Brasil</i>
            </div>
        </div>
        <h4 class="ui dividing header">Informações de pagamento</h4>
        <div class="field">
            <label>Bandeira do Cartão</label>
            <i><?=$item['bandeiraCartao'] ?></i>
        </div>
        <div class="four fields">
            <div class="field">
                <label>Número do Cartão</label>
                <i><?=$item['numeroCartao'] ?></i>
            </div>
            <div class="field">
                <label>CVC</label>
                <i><?=$item['cvc'] ?></i>
            </div>
            <div class="field">
                <label>Expira em:</label>
                <i><?=$item['mesVencimento'] ?></i>
            </div>
            <div class="field">
                <label>Ano de Vencimento</label>
                <i><?=$item['anoVencimento'] ?></i>
            </div>
        </div>
        <h4 class="ui dividing header">Não quero pagar com cartão de crédito</h4>
        <div class="ui segment">
            <div class="field">
                <div class="ui toggle checkbox">
                    <input type="checkbox" name="gift" tabindex="0">
                    <label>Pagar em dinheiro para o entregador</label>
                </div>
            </div>
        </div>
        <h4 class="ui dividing header">Recibo</h4>
        <div class="ui segment">
            <div class="field">
                <div class="ui toggle checkbox">
                    <input type="checkbox" name="gift" tabindex="0">
                    <label>Não incluir o recibo no pacote</label>
                </div>
            </div>
        </div>

        <div>
            <a href="mostrarHorario.php">
                <div class="ui button" tabindex="0" style="color: #ffffff;margin-top: 2%;margin-left: 36%;background-color: #147ece;width: 28%;padding: 2%;">Enviar pedido</div>
            </a>
        </div>
        <div>
            <a href="cadastroDados.php">
                <button class="ui secondary button" style="margin-left: 43%;margin-top: 1%;">Editar dados</button>
            </a>
        </div>
    </form>
    <h2 class="ui dividing header" style="margin-left: 14%;">Informações da compra</h2>
    <div style=" margin-top: 4%;
    margin-left: 4%;">
        <div class="ui card" style="float: left; margin-right: 3%;margin-top: 1%;">
            <div class="ui slide right reveal image">
                <div class="visible content">
                    <img class="ui fluid image" src="img/arroz.png">
                </div>
                <div class="hidden content">
                    <img class="ui fluid image" src="img/cafe.png">
                </div>
            </div>
            <div class="content">
                <div class="header">Title</div>
                <div class="meta">
                    <a class="group">Meta</a>
                </div>
                <div class="description">One or two sentence description that may go to several lines</div>
            </div>
        </div>
        <div class="ui card" style="float: left; margin-right: 3%;">
            <div class="ui slide right reveal image">
                <div class="visible content">
                    <img class="ui fluid image" src="img/arroz.png">
                </div>
                <div class="hidden content">
                    <img class="ui fluid image" src="img/cafe.png">
                </div>
            </div>
            <div class="content">
                <div class="header">Title</div>
                <div class="meta">
                    <a class="group">Meta</a>
                </div>
                <div class="description">One or two sentence description that may go to several lines</div>
            </div>
        </div>
        <div class="ui card" style="float: left; margin-right: 3%;">
            <div class="ui slide right reveal image">
                <div class="visible content">
                    <img class="ui fluid image" src="img/arroz.png">
                </div>
                <div class="hidden content">
                    <img class="ui fluid image" src="img/cafe.png">
                </div>
            </div>
            <div class="content">
                <div class="header">Title</div>
                <div class="meta">
                    <a class="group">Meta</a>
                </div>
                <div class="description">One or two sentence description that may go to several lines</div>
            </div>
        </div>
        <div class="ui card" style="float: left;">
            <div class="ui slide right reveal image">
                <div class="visible content">
                    <img class="ui fluid image" src="img/arroz.png">
                </div>
                <div class="hidden content">
                    <img class="ui fluid image" src="img/cafe.png">
                </div>
            </div>
            <div class="content">
                <div class="header">Title</div>
                <div class="meta">
                    <a class="group">Meta</a>
                </div>
                <div class="description">One or two sentence description that may go to several lines</div>
            </div>
        </div>
    </div>
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<?php endforeach; ?>

<div class="ui divider" style="margin-top: 40%;"></div>
<div style="margin-bottom: 6%; margin-left: 38%;">
    <div>
        <button class="ui large secondary button" style="float: left;">Editar produto(s)</button>
    </div>
    <div>
        <a href="mostrarHorario.php">
            <button class="ui large primary button">Confirmar pedido</button>
        </a>
    </div>
</div>
</body>
</html>