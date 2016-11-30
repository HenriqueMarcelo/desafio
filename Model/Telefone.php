<?php
class Telefone{

  private $id;
  private $fornecedorId;
  private $ddd;
  private $numero;
  private $referencia;

  public function __construct($ddd,$numero,$referencia,$id=null,$fornecedorId=null){
    $this->id = $id;
    $this->ddd = $ddd;
    $this->numero = $numero;
    $this->referencia = $referencia;
    $this->fornecedorId = $fornecedorId;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getId(){
    return $this->id;
  }

  public function setFornecedorId($fornecedorId){
    $this->fornecedorId = $fornecedorId;
  }

  public function getFornecedorId(){
    return $this->fornecedorId;
  }

  public function setDdd($ddd){
    $this->ddd = $ddd;
  }

  public function getDdd(){
    return $this->ddd;
  }

  public function setNumero($numero){
    $this->numero = $numero;
  }

  public function getNumero(){
    return $this->numero;
  }

  public function setReferencia($referencia){
    $this->referencia = $referencia;
  }

  public function getReferencia(){
    return $this->referencia;
  }

}
?>
