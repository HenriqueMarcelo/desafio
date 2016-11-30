<?php
  include_once "Model/Pedido.php";
  include_once('Dao/ColecaoFornecedor.php');
  include_once('Dao/ColecaoTransportadora.php');
  include_once('Dao/ColecaoProduto.php');
  class ColecaoPedido{
    private $bd;
    private $daoFornecedor;
    private $daoTransportadora;
    private $daoProduto;
    public function __construct() {
        $this->daoFornecedor = new ColecaoFornecedor();
        $this->daoTransportadora = new ColecaoTransportadora();
        $this->daoProduto = new ColecaoProduto();

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

    public function cadastrarItem(Item &$item,$pedidoId ){
      $sql = 'insert into item (produto_id, pedido_id, quantidade, valor) values (?,?,?,?)';

      $ps1 = $this->bd->prepare($sql);
      $ps1->execute(
        array(
          $item->getProduto()->getId(), 
          $pedidoId,
          $item->getQuantidade(),
          $item->getValor()
        )
      );
      $item->setId( $this->bd->lastInsertId() );
    }

    public function cadastrarPedido(Pedido &$pedido){
      $sql = 'insert into pedido (transportadora_id, data_hora, nota_fiscal, valor_frete, desconto, valor_total) values (?,?,?,?,?,?)';

      $ps1 = $this->bd->prepare($sql);
      $ps1->execute(
        array(
          $pedido->getTransportadora()->getId(), 
          $pedido->getDataHora(),
          $pedido->getNotaFiscal(),
          $pedido->getValorFrete(),
          $pedido->getDesconto(),
          $pedido->getValorTotal()
        )
      );
      $pedido->setId( $this->bd->lastInsertId() );

      foreach ($pedido->getItens() as $key => $value) {
          $this->cadastrarItem($value,$pedido->getId());
      }
    }

    public function todosPedidos(){
      $sql = 'select * from pedido';
      $ps = $this->bd->query($sql);
      $retorno = array();
      
      while($obj = $ps->fetchObject()){
        $transportadora = $this->daoTransportadora->comId($obj->transportadora_id);
        $itens = $this->itensComPedido($obj->id);
        $pedido = new Pedido(
            $obj->data_hora,
            $obj->nota_fiscal,
            $obj->valor_frete,
            $obj->desconto,
            $obj->valor_total,
            $transportadora,
            $itens,
            $obj->id

        );
        array_push($retorno, $pedido);
      }
      return $retorno;
    }

    public function itensComPedido($id){
      $retorno = array();
      $sql = 'SELECT * from item where pedido_id = ?';
      $ps = $this->bd->prepare($sql);
      $resposta = $ps->execute(array($id));
      
      while($obj = $ps->fetchObject()){
        $produto = $this->daoProduto->comId($obj->produto_id);
        $item = new Item(
          $obj->quantidade,
          $obj->valor,
          $produto,
          $obj->id
        );
        array_push($retorno, $item);
      }
      return $retorno;
    }

    public function comId($id){
      $sql = 'SELECT * from pedido where id = ?';
      $ps1 = $this->bd->prepare($sql);
      $resultado = $ps1->execute(array($id));

      while($obj = $ps1->fetchObject()){
        
        $transportadora = $this->daoTransportadora->comId($obj->transportadora_id);
        $itens = $this->itensComPedido($obj->id);
        $pedido = new Pedido(
            $obj->data_hora,
            $obj->nota_fiscal,
            $obj->valor_frete,
            $obj->desconto,
            $obj->valor_total,
            $transportadora,
            $itens,
            $obj->id

        );
        return $pedido;
      }
    }

    public function atualizarPedido (Pedido $pedido){
      $its = $pedido->getItens();

      $sql = 'UPDATE pedido SET transportadora_id = ?, data_hora = ?, nota_fiscal = ?, valor_frete = ?, desconto = ?, valor_total = ?  where id =  ?';
      $ps1 = $this->bd->prepare($sql);
      $ps1->execute(
        array(
          $pedido->getTransportadora()->getId(), 
          $pedido->getDataHora(),
          $pedido->getNotaFiscal(),
          $pedido->getValorFrete(), 
          $pedido->getDesconto(), 
          $pedido->getValorTotal(),  
          $pedido->getId()
        )
      );

      foreach ($its as $item) {
          $sql = 'UPDATE item set produto_id = ?, quantidade = ?, valor = ?
            where id = ?';
          $ps3 = $this->bd->prepare($sql);
          $ps3->execute(
            array(
              $item->getProduto()->getId(),
              $item->getQuantidade(),
              $item->getValor(),
              $item->getId()
            )
          );
        }
    }

    public function excluirPedido($id){
      $sql = "DELETE from pedido WHERE id = ?";
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
