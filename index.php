<?php
include('controller/ControladoraFornecedor.php');
include('controller/ControladoraProduto.php');
include('controller/ControladoraTransportadora.php');
include('controller/ControladoraPedido.php');

$controladora;

	if(isset($_GET['local'])){
		switch ($_GET['local']) {
			case 'fornecedor':
				$controladora = new ControladoraFornecedor();
				switch ($_GET['acao']) {
					case 'criar':
						if($_POST)
							$controladora->criarFornecedor();
						else{
							include "View/parte-cima.php";
							include "View/cadastrar-fornecedor.php";
							include "View/parte-baixo.php";
						}

						break;
					case 'todos':
						$controladora->listarFornecedores();
						break;
					case 'atualizar':
						if($_POST)
							$controladora->atualizarFornecedor();
						else{
							$controladora->mostrarTelaAtualizarFornecedor();
						}
						break;
					case 'deletar':
						$controladora->excluirFornecedor();
						break;
					case 'comId':
						$controladora->comId();
						break;
				}
				break;

			case 'produto':
				$controladora = new ControladoraProduto();
				switch ($_GET['acao']) {
					case 'criar':
						if($_POST)
							$controladora->criarProduto();
						else{
							$controladora->mostrarTelaCadastrarProduto();
						}
						break;
					case 'atualizar':
						if($_POST)
							$controladora->atualizarProduto();
						else{
							$controladora->mostrarTelaAtualizarProduto();
						}
						break;
					case 'deletar':
						$controladora->excluirProduto();
						break;
					case 'todos':
						$controladora->listarProdutos();
						break;
				}
				break;

			case 'transportadora':
				$controladora = new ControladoraTransportadora();
				switch ($_GET['acao']) {
					case 'criar':
						if($_POST)
							$controladora->criarTransportadora();
						else{
							$controladora->mostrarTelaCadastrarTransportadora();
						}
						break;
					case 'atualizar':
						if($_POST)
							$controladora->atualizarTransportadora();
						else{
							$controladora->mostrarTelaAtualizarTransportadora();
						}
						break;
					case 'deletar':
						$controladora->excluirTransportadora();
						break;
					case 'todos':
						$controladora->listarTransportadoras();
						break;
				}
				break;

			case 'pedido':
				$controladora = new ControladoraPedido();
				switch ($_GET['acao']) {
					case 'criar':
						if($_POST)
							$controladora->criarPedido();
						else
							$controladora->mostrarTelaCadastrarPedido();
						break;
					case 'comId':
							$controladora->comId();
						break;
					case 'atualizar':
						if($_POST)
							$controladora->atualizarPedido();
						else
							$controladora->mostrarTelaAtualizarPedido();
						break;
					case 'deletar':
						$controladora->excluirPedido();
						break;
					case 'todos':
						$controladora->listarPedido();
						break;
				}
				break;
		}
	}
	else{

		include "View/parte-cima.php";
		//include "View/tela-inicial.php";
		include "View/parte-baixo.php";
	}
?>