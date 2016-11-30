<?php
class Fornecedor{

	private $id;
	private $nome;
	private $descricao;
	private $cidade;
	private $endereco;
	private $bairro;
	private $numero;

  private $telefones;
  private $emails;


	public function __construct(
		$nome,
		$descricao,
		$cidade,
		$endereco,
		$bairro,
		$numero,
		$id=null
		){

		$this->id = $id;
		$this->nome = $nome;
		$this->descricao = $descricao;
		$this->cidade = $cidade;
		$this->endereco = $endereco;
		$this->bairro = $bairro;
		$this->numero = $numero;
    }

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

    public function setCidade($cidade){
      $this->cidade = $cidade;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setEndereco($endereco){
      $this->endereco = $endereco;
    }

    public function getEndereco(){
        return $this->endereco;
    }
    public function setBairro($bairro){
      $this->bairro = $bairro;
    }

    public function getBairro(){
        return $this->bairro;
    }
    public function setNumero($numero){
      $this->numero = $numero;
    }

    public function getNumero(){
        return $this->numero;
    }

    //Utilizado em buscas

    public function getTelefones(){
      return $this->telefones;
    }

    public function getEmails(){
      return $this->emails;
    }

    public function setEmails($emails){
      $this->emails = $emails;
    }

    public function setTelefones($telefones){
      $this->telefones = $telefones;
    }
}
?>