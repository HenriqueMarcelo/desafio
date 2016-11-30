<?php
class Item{

  private $id;
  private $quantidade;
  private $valor;
  private $produto;

  public function __construct($quantidade,$valor,$produto=null,$id=null){
    $this->id = $id;
    $this->quantidade = $quantidade;
    $this->valor = $valor;
    $this->produto = $produto;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setQuantidade($quantidade){
    $this->quantidade = $quantidade;
  }

  public function getQuantidade(){
    return $this->quantidade;
  }

  public function setValor($valor){
    $this->valor = $valor;
  }

  public function getValor(){
    return $this->valor;
  }

  public function setProduto($produto){
    $this->produto = $produto;
  }

  public function getProduto(){
    return $this->produto;
  }

}
?>
