<?php
  include_once "Model/Produto.php";
  include_once('Dao/ColecaoFornecedor.php');
  class ColecaoProduto{
    private $bd;
    private $daoFornecedor;
    public function __construct() {
        $this->daoFornecedor = new ColecaoFornecedor();
        $opcoes = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" );
        $dsn = "mysql:dbname=banco;host=localhost";
        $user = "root";
        $pw = "";
        $this->bd = null;
        try{
            $this->bd = new PDO($dsn, $user, $pw, $opcoes);
        } catch (Exception $ex) {
            die(($ex->getMessage()));
        }
    }

    public function cadastrarProduto(Produto &$produto){
      $sql = 'insert into produto (nome, descricao, fornecedor_id) values (?,?,?)';

      $ps1 = $this->bd->prepare($sql);
      $ps1->execute(
        array(
          $produto->getNome(), 
          $produto->getDescricao(),
          $produto->getFornecedor()->getId()
        )
      );
      $produto->setId( $this->bd->lastInsertId() );

    }



    public function todosProdutos(){
      $sql = 'select * from produto';
      $ps = $this->bd->query($sql);
      $retorno = array();
      
      while($obj = $ps->fetchObject()){
        $fornecedor = $this->daoFornecedor->comId($obj->fornecedor_id);
        $produto = new Produto(
          $obj->nome,
          $obj->descricao,
          $fornecedor,
          $obj->id
        );
        array_push($retorno, $produto);
      }
      return $retorno;
    }

    public function comId($id){
      $sql = 'select * from produto where id = ?';
      $ps1 = $this->bd->prepare($sql);
      $resultado = $ps1->execute(array($id));

      while($p = $ps1->fetchObject()){
        
        $fornecedor = $this->daoFornecedor->comId($p->fornecedor_id);
        $produto = new Produto(
          $p->nome,
          $p->descricao,
          $fornecedor,
          $p->id 
        );

        return $produto;
      }
    }

    

    public function atualizarProduto(Produto $produto){
      $sql = 'UPDATE produto SET nome = ?, descricao = ?, fornecedor_id = ? where id =  ?';
      $ps1 = $this->bd->prepare($sql);
      $ps1->execute(
        array(
          $produto->getNome(), 
          $produto->getDescricao(),
          $produto->getFornecedor()->getId(), 
          $produto->getId()
        )
      );
    }

    public function excluirProduto($id){
      $sql = "DELETE from produto WHERE id = ?";
      $ps = $this->bd->prepare($sql);
      $ps->execute(array($id));

      if($ps->rowCount() > 0){
        return 'Remoção realizada com sucesso!';
      }
      else{
        return 'Erro de remoção';
      }

    }

  }
?>
