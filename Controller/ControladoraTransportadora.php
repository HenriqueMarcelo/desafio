<?php

include_once('Model/Transportadora.php');
include_once('Dao/ColecaoTransportadora.php');

  class ControladoraTransportadora{

    private $dao;

    public function __construct(){
      $this->dao = new ColecaoTransportadora();
    }

    public function criarTransportadora(){
        $transportadora = new Transportadora(
            $_POST['nome']
        );
        
        $this->dao->cadastrarTransportadora($transportadora);
        
        //lista os fornecedores
        $this->listarTransportadoras();
    }


    public function listarTransportadoras(){
        $transportadoras = $this->dao->todosTransportadoras();
        include "View/parte-cima.php";
        include "View/listar-transportadoras.php";
        include "View/parte-baixo.php";
            
    }

    //Ver se vai ser utíl
    public function comId(){
        $transportadora = $this->dao->comId($_GET['id']);
        include "View/parte-cima.php";
        include "View/listar-transportadoras.php";
        include "View/parte-baixo.php";
    }

    public function atualizarTransportadora(){
        $transportadora = new Transportadora(
            $_POST['nome'],
            $_POST['id']
        );
        
        $this->dao->atualizarTransportadora($transportadora);
        
        $this->listarTransportadoras();
    }

    public function mostrarTelaAtualizarTransportadora(){
        $transportadora = $this->dao->comId($_GET['id']);
        include "View/parte-cima.php";
        include "View/editar-transportadora.php";
        include "View/parte-baixo.php";
    }

    public function mostrarTelaCadastrarTransportadora(){
        include "View/parte-cima.php";
        include "View/cadastrar-transportadora.php";
        include "View/parte-baixo.php";
    }

    public function excluirTransportadora(){
        $this->dao->excluirTransportadora($_GET['id']);
        $this->listarTransportadoras();
    }
  }
?>
