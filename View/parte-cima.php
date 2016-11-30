<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projeto</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <style type="text/css">
        .item{
            border-top: 1px solid #eee;
            border-top-width: 1px;
            border-top-style: solid;
            border-top-color: rgb(238, 238, 238);
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="index.php">
                        Home Page
                    </a>
                </li>
                <li>
                    <a href="index.php?local=fornecedor&acao=criar">Cadastrar Fornecedor</a>
                </li>
                <li>
                    <a href="index.php?local=fornecedor&acao=todos">Listar Fornecedor</a>
                </li>

                <li>
                    <a href="index.php?local=produto&acao=criar">Cadastrar Produto</a>
                </li>

                <li>
                    <a href="index.php?local=produto&acao=todos">Listar Produto</a>
                </li>

                <li>
                    <a href="index.php?local=transportadora&acao=criar">Cadastrar Transportadora</a>
                </li>

                <li>
                    <a href="index.php?local=transportadora&acao=todos">Listar Transportadoras</a>
                </li>
                <li>
                    <a href="index.php?local=pedido&acao=criar">Cadastrar Pedidos</a>
                </li>
                <li>
                    <a href="index.php?local=pedido&acao=todos">Listar Pedidos</a>
                </li>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
