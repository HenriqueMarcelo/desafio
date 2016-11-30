<?php

include('Model/Telefone.php');
include('Model/Email.php');
include('Model/Fornecedor.php');
include('Dao/ColecaoFornecedor.php');

  class ControladoraFornecedor{

    private $dao;

    public function __construct(){
      $this->dao = new ColecaoFornecedor();
    }

    public function criarFornecedor(){
        $fornecedor = new Fornecedor(
            $_POST['nome'],
            $_POST['descricao'],
            $_POST['cidade'],
            $_POST['endereco'],
            $_POST['bairro'],
            $_POST['numero']
        );
        $t = array();
        $e = array();
        for($i=1;$i<=$_POST['telefonesContador'];$i++){
            $telefone = new Telefone(
                $_POST['ddd'.$i],
                $_POST['numero'.$i],
                $_POST['referenciatelefone'.$i]
            );
            array_push($t, $telefone);
        }
        for($ii=1;$ii<=$_POST['emailsContador'];$ii++){
            $email = new Email(
                $_POST['email'.$ii],
                $_POST['referenciaemail'.$ii]
            );
            array_push($e, $email);
        }
        $fornecedor->setTelefones($t);
        $fornecedor->setEmails($e);
        $this->dao->cadastrarFornecedor($fornecedor);
        
        //lista os fornecedores
        $this->listarFornecedores();
    }


    public function listarFornecedores(){
        $fornecedores = $this->dao->listarFornecedores();
        include "View/parte-cima.php";
        include "View/listar-fornecedor.php";
        include "View/parte-baixo.php";
            
    }

    public function comId(){
        $fornecedor = $this->dao->comId($_GET['id']);
        include "View/parte-cima.php";
        include "View/exibir-fornecedor.php";
        include "View/parte-baixo.php";
    }

    public function atualizarFornecedor(){
        $fornecedor = new Fornecedor(
            $_POST['nome'],
            $_POST['descricao'],
            $_POST['cidade'],
            $_POST['endereco'],
            $_POST['bairro'],
            $_POST['numero'],
            $_POST['idfornecedor']
        );

        $t = array();
        $e = array();

        for($i=1;$i<=$_POST['telefonesContador'];$i++){
            $telefone = new Telefone(
                $_POST['ddd'.$i],
                $_POST['numero'.$i],
                $_POST['referenciatelefone'.$i],
                $_POST['idtelefone'.$i],
                $_POST['idfornecedor']
            );
            array_push($t, $telefone);
        }

        for($ii=1;$ii<=$_POST['emailsContador'];$ii++){
            $email = new Email(
                $_POST['email'.$ii],
                $_POST['referenciaemail'.$ii],
                $_POST['idemail'.$ii],
                $_POST['idfornecedor']
            );
            array_push($e, $email);
        }

        $fornecedor->setTelefones($t);
        $fornecedor->setEmails($e);

        $this->dao->atualizarFornecedor($fornecedor);
        
        //lista os fornecedores
        $this->listarFornecedores();
    }

    public function mostrarTelaAtualizarFornecedor(){
        $fornecedor = $this->dao->comId($_GET['id']);
        include "View/parte-cima.php";
        include "View/editar-fornecedor.php";
        include "View/parte-baixo.php";
    }

    public function excluirFornecedor(){
        $this->dao->excluirFornecedor($_GET['id']);
        //lista os fornecedores
        $this->listarFornecedores();
    }
  }
?>
