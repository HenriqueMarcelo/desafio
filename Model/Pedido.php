<?php
class Pedido{

  private $id;
  private $dataHora;
  private $notaFiscal;
  private $valorFrete;
  private $desconto;
  private $valorTotal;

  private $trasportadora;
  private $itens;

  public function __construct($dataHora,$notaFiscal,$valorFrete,$desconto,$valorTotal,$trasportadora=null, $itens=null,$id=null){
    $this->id = $id;
    $this->dataHora = $dataHora;
    $this->notaFiscal = $notaFiscal;
    $this->valorFrete = $valorFrete;
    $this->desconto = $desconto;
    $this->valorTotal = $valorTotal;
    $this->trasportadora = $trasportadora;
    $this->itens = $itens;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setDataHora($dataHora){
    $this->dataHora = $dataHora;
  }

  public function getDataHora(){
    return $this->dataHora;
  }

  public function setNotaFiscal($notaFiscal){
    $this->notaFiscal = $notaFiscal;
  }

  public function getNotaFiscal(){
    return $this->notaFiscal;
  }

  public function setValorFrete($valorFrete){
    $this->valorFrete = $valorFrete;
  }

  public function getValorFrete(){
    return $this->valorFrete;
  }

  public function setDesconto($desconto){
    $this->desconto = $desconto;
  }

  public function getDesconto(){
    return $this->desconto;
  }

  public function setValorTotal($valorTotal){
    $this->valorTotal = $valorTotal;
  }

  public function getValorTotal(){
    return $this->valorTotal;
  }

  public function setItens($itens){
    $this->itens = $itens;
  }

  public function getItens(){
    return $this->itens;
  }

  public function setTransportadora($trasportadora){
    $this->trasportadora = $trasportadora;
  }

  public function getTransportadora(){
    return $this->trasportadora;
  }

}
?>
