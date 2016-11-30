<?php
include_once('Model/Produto.php');
include_once('Model/Fornecedor.php');
include_once('Model/Pedido.php');
include_once('Model/Item.php');
include_once('Model/Transportadora.php');
include_once('Dao/ColecaoFornecedor.php');
include_once('Dao/ColecaoProduto.php');
include_once('Dao/ColecaoPedido.php');

  class ControladoraPedido{

    private $dao;
    private $daoFornecedor;
    private $daoTransportadora;

    public function __construct(){
      $this->dao = new ColecaoPedido();
      $this->daoProduto = new ColecaoProduto();
      $this->daoFornecedor = new ColecaoFornecedor();
      $this->daoTransportadora = new ColecaoTransportadora();
    }

    public function criarPedido(){
        $it = array();
        for($i=1;$i<=$_POST['itemContador'];$i++){
            $produto = $this->daoProduto->comId($_POST['produtoId'.$i]);
            $item = new Item(
                $_POST['quantidade'.$i],
                $_POST['valorProduto'.$i],
                $produto
            );
            //var_dump($item);
            //inserir cada item no banco
            array_push($it, $item);
        }

        $transportadora = $this->daoTransportadora->comId($_POST['transportadora']);
        
        $pedido = new Pedido(
            time(),
            $_POST['notaFiscal'],
            $_POST['valorFrete'],
            $_POST['valorDesconto'],
            $_POST['valorTotal'],
            $transportadora,
            $it
        );

        //var_dump($pedido);
        $this->dao->cadastrarPedido($pedido);
        
        $this->listarPedido();
    }


    public function listarPedido(){
        $pedidos = $this->dao->todosPedidos();
        include "View/parte-cima.php";
        include "View/listar-pedido.php";
        include "View/parte-baixo.php";
            
    }

    public function comId(){
        $produtos = $this->daoProduto->todosProdutos();
        $transportadoras = $this->daoTransportadora->todosTransportadoras();
        $pedido = $this->dao->comId($_GET['id']);
        include "View/parte-cima.php";
        include "View/exibir-pedido.php";
        include "View/parte-baixo.php";
    }

    public function atualizarPedido(){
        $it = array();
        for($i=1;$i<$_POST['itemContador'];$i++){
            $produto = $this->daoProduto->comId($_POST['produtoId'.$i]);
            $item = new Item(
                $_POST['quantidade'.$i],
                $_POST['valorProduto'.$i],
                $produto,
                $_POST['itemId'.$i]
            );
            array_push($it, $item);
        }

        $transportadora = $this->daoTransportadora->comId($_POST['transportadora']);
        
        $pedido = new Pedido(
            time(),
            $_POST['notaFiscal'],
            $_POST['valorFrete'],
            $_POST['valorDesconto'],
            $_POST['valorTotal'],
            $transportadora,
            $it,
            $_POST['pedidoId']

        );

        //var_dump($pedido);
        //$this->dao->cadastrarPedido($pedido);
        
        
        $this->dao->atualizarPedido($pedido);


        $this->listarPedido();
        
    }

    public function mostrarTelaAtualizarPedido(){
        $produtos = $this->daoProduto->todosProdutos();
        $transportadoras = $this->daoTransportadora->todosTransportadoras();
        $pedido = $this->dao->comId($_GET['id']);
        include "View/parte-cima.php";
        include "View/editar-pedido.php";
        include "View/parte-baixo.php";
    }

    public function mostrarTelaCadastrarPedido(){
        $produtos = $this->daoProduto->todosProdutos();
        $transportadoras = $this->daoTransportadora->todosTransportadoras();
        include "View/parte-cima.php";
        include "View/cadastrar-pedido.php";
        include "View/parte-baixo.php";
    }

    public function excluirPedido(){
        $this->dao->excluirPedido($_GET['id']);
        $this->listarPedido();
    }
  }


?>
