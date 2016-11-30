<?php
class Produto{

  //Atributos
  private $id;
  private $nome;
  private $descricao;
  private $fornecedor;

  //Construtor
  public function __construct(
    $nome,
    $descricao,
    $fornecedor=null,
    $id=null
  ){
    $this->id = $id;
    $this->nome = $nome;
    $this->descricao = $descricao;
    $this->fornecedor = $fornecedor;
  }

  //Sets e gets
  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setNome($nome){
    $this->nome = $nome;
  }

  public function getNome(){
    return $this->nome;
  }

  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }

  public function getDescricao(){
    return $this->descricao;
  }

  public function setFornecedor($fornecedor){
    $this->fornecedor = $fornecedor;
  }

  public function getFornecedor(){
    return $this->fornecedor;
  }
}
?>
