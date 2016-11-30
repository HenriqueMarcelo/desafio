<?php

class Email{

    private $id;
    private $fornecedorId;
    private $email;
    private $referencia;

    public function __construct($email,$referencia,$id=null,$fornecedorId=null){
      $this->id = $id;
      $this->email = $email;
      $this->referencia = $referencia;
      $this->fornecedorId = $fornecedorId;
    }

    //Sets e gets dos atributos
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

    public function setEmail($email){
      $this->email = $email;
    }

    public function getEmail(){
      return $this->email;
    }

    public function setReferencia($referencia){
      $this->referencia = $referencia;
    }

    public function getReferencia(){
      return $this->referencia;
    }
}
?>
