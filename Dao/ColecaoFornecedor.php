<?php
  include_once "Model/Fornecedor.php";


  class ColecaoFornecedor{
    private $bd;

    //Construtor
    public function __construct() {
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

    public function cadastrarFornecedor(Fornecedor &$fornecedor){
      $telefones = $fornecedor->getTelefones();
      $emails = $fornecedor->getEmails();

      $sql = 'insert into fornecedor (nome, descricao, cidade, endereco,
        bairro, numero) values (?,?,?,?,?,?)';

      $ps1 = $this->bd->prepare($sql);
      $ps1->execute(
        array(
          $fornecedor->getNome(), 
          $fornecedor->getDescricao(),
          $fornecedor->getCidade(), 
          $fornecedor->getEndereco(),
          $fornecedor->getBairro(), 
          $fornecedor->getNumero()
        )
      );
      $fornecedor->setId( $this->bd->lastInsertId() );

      //Inserindo o telefone

      for($i = 0; $i < sizeof($telefones); $i++){
        $sql = 'insert into telefone (fornecedor_id, ddd, numero, referencia)
          values (?,?,?,?)';
        $ps2 = $this->bd->prepare($sql);
        $ps2->execute(
          array(
            $fornecedor->getId(),
            $telefones[$i]->getDdd(),
            $telefones[$i]->getNumero(), 
            $telefones[$i]->getReferencia()
          )
        );
        $telefones[$i]->setFornecedorId( $fornecedor->getId() );
        $telefones[$i]->setId( $this->bd->lastInsertId() );
      }

      //Inserindo Email

      for($i = 0; $i < sizeof($emails); $i++){
        $sql = 'insert into email (fornecedor_id, email, referencia)
          values (?,?,?)';
        $ps3 = $this->bd->prepare($sql);
        $ps3->execute(
          array(
            $fornecedor->getId(), 
            $emails[$i]->getEmail(),
            $emails[$i]->getReferencia()
          )
        );
        $emails[$i]->setFornecedorId( $fornecedor->getId() );
        $emails[$i]->setId( $this->bd->lastInsertId() );
      }

      $fornecedor->setTelefones( $telefones );
      $fornecedor->setEmails( $emails );
    }



    public function listarFornecedores(){
      $sql = 'select * from fornecedor';
      $ps = $this->bd->query($sql);
      $retorno = array();
      
      while($obj = $ps->fetchObject()){
        $fornecedor = new Fornecedor(
          $obj->nome,
          $obj->descricao,
          $obj->cidade,
          $obj->endereco,
          $obj->bairro,
          $obj->numero,
          $obj->id
        );
        array_push($retorno, $fornecedor);
      }
      return $retorno;
    }

    public function comId($id){
      $sql = 'select * from fornecedor where id = ?';
      $ps1 = $this->bd->prepare($sql);
      $resultado = $ps1->execute(array($id));

      while($f = $ps1->fetchObject()){
        
        $fornecedor = new Fornecedor(
          $f->nome,
          $f->descricao,
          $f->cidade,
          $f->endereco,
          $f->bairro,
          $f->numero,
          $f->id
        );

        $telefones = array();

        $sql = 'select * from telefone where fornecedor_id = ?';
        $ps2 = $this->bd->prepare($sql);
        $resultado = $ps2->execute(array($id));
        while($t = $ps2->fetchObject()){
          $telefone = new Telefone(
            $t->ddd,
            $t->numero,
            $t->referencia,
            $t->id,
            $fornecedor->getId()
          );
          array_push($telefones,$telefone);
        }

        $emails = array();

        $sql = 'select * from email where fornecedor_id = ?';
        $ps3 = $this->bd->prepare($sql);
        $resultado = $ps3->execute(array($id));

        while($e = $ps3->fetchObject()){
            $email = new Email(
            $e->email,
            $e->referencia,
            $e->id,
            $fornecedor->getId()
          );
          array_push($emails,$email);
        }

        $fornecedor->setTelefones( $telefones );
        $fornecedor->setEmails( $emails );

        return $fornecedor;
      }
    }

    

    public function atualizarFornecedor(Fornecedor $fornecedor){
      $telefones = $fornecedor->getTelefones();
      $emails = $fornecedor->getEmails();

      $sql = 'UPDATE fornecedor SET nome = ?, descricao = ?, cidade = ?,
        endereco = ?, bairro = ?, numero = ? where id =  ?';
      $ps1 = $this->bd->prepare($sql);
      $ps1->execute(
        array(
          $fornecedor->getNome(), 
          $fornecedor->getDescricao(),
          $fornecedor->getCidade(), 
          $fornecedor->getEndereco(),
          $fornecedor->getBairro(),
          $fornecedor->getNumero(), 
          $fornecedor->getId()
        )
      );

        foreach ($telefones as $telefone) {
          $sql = 'UPDATE telefone SET ddd = ?, numero = ?, referencia = ?
            where id = ?';
          $ps2 = $this->bd->prepare($sql);
          $ps2->execute(
            array(
              $telefone->getDdd(),
              $telefone->getNumero(), 
              $telefone->getReferencia(),
              $telefone->getId()
            )
          );
        }

        foreach ($emails as $email) {
          $sql = 'UPDATE email set email = ?, referencia = ?
            where id = ?';
          $ps3 = $this->bd->prepare($sql);
          $ps3->execute(
            array(
              $email->getEmail(),
              $email->getReferencia(),
              $email->getId()
            )
          );
        }

        $fornecedor->setTelefones( $telefones );
        $fornecedor->setEmails( $emails );

    }

    public function excluirFornecedor($id){
      $sql = "DELETE from fornecedor WHERE id = ?";
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
