<?php
  include_once "Model/Transportadora.php";

  class ColecaoTransportadora{
    private $bd;
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

    public function cadastrarTransportadora(Transportadora &$transportadora){
      $sql = 'insert into transportadora (nome) values (?)';

      $ps1 = $this->bd->prepare($sql);
      $ps1->execute(
        array(
          $transportadora->getNome()
        )
      );
      $transportadora->setId( $this->bd->lastInsertId() );

    }



    public function todosTransportadoras(){
      $sql = 'SELECT * FROM transportadora';
      $ps = $this->bd->query($sql);
      $retorno = array();
      while($obj = $ps->fetchObject()){
        $transportadora = new Transportadora(
          $obj->nome,
          $obj->id
        );
        array_push($retorno, $transportadora);
      }
      return $retorno;
    }

    public function comId($id){
      $sql = 'select * from transportadora where id = ?';
      $ps1 = $this->bd->prepare($sql);
      $resultado = $ps1->execute(array($id));

      while($t = $ps1->fetchObject()){
        $transportadora = new Transportadora(
          $t->nome,
          $t->id 
        );
        return $transportadora;
      }
    }

    

    public function atualizarTransportadora(Transportadora $transportadora){
      $sql = 'UPDATE transportadora SET nome = ? where id =  ?';
      $ps1 = $this->bd->prepare($sql);
      $ps1->execute(
        array(
          $transportadora->getNome(),
          $transportadora->getId()
        )
      );
    }

    public function excluirTransportadora($id){
      $sql = "DELETE from transportadora WHERE id = ?";
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
