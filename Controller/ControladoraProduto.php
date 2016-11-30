<?php

include_once('Model/Produto.php');
include_once('Model/Fornecedor.php');
include_once('Dao/ColecaoFornecedor.php');
include_once('Dao/ColecaoProduto.php');

  class ControladoraProduto{

    private $dao;
    private $daoFornecedor;

    public function __construct(){
      $this->dao = new ColecaoProduto();
      $this->daoFornecedor = new ColecaoFornecedor();
    }

    public function criarproduto(){
        $fornecedor = $this->daoFornecedor->comId($_POST['fornecedorId']);
        $produto = new Produto(
            $_POST['nome'],
            $_POST['descricao'],
            $fornecedor
        );
        
        $this->dao->cadastrarProduto($produto);
        
        //lista os fornecedores
        $this->listarProdutos();
    }


    public function listarProdutos(){
        $produtos = $this->dao->todosProdutos();
        include "View/parte-cima.php";
        include "View/listar-produto.php";
        include "View/parte-baixo.php";
            
    }

    //Ver se vai ser utíl
    public function comId(){
        $produto = $this->dao->comId($_GET['id']);
        include "View/parte-cima.php";
        include "View/listar-produtos.php";
        include "View/parte-baixo.php";
    }

    public function atualizarProduto(){
        $fornecedor = $this->daoFornecedor->comId($_POST['fornecedorId']);
        $produto = new Produto(
            $_POST['nome'],
            $_POST['descricao'],
            $fornecedor,
            $_POST['id']
        );
        
        $this->dao->atualizarProduto($produto);
        
        $this->listarprodutos();
    }

    public function mostrarTelaAtualizarProduto(){
        $fornecedores = $this->daoFornecedor->listarFornecedores();
        $produto = $this->dao->comId($_GET['id']);
        include "View/parte-cima.php";
        include "View/editar-produto.php";
        include "View/parte-baixo.php";
    }

    public function mostrarTelaCadastrarProduto(){
        $fornecedores = $this->daoFornecedor->listarFornecedores();
        include "View/parte-cima.php";
        include "View/cadastrar-produto.php";
        include "View/parte-baixo.php";
    }

    public function excluirProduto(){
        $this->dao->excluirProduto($_GET['id']);
        $this->listarProdutos();
    }
  }
?>
