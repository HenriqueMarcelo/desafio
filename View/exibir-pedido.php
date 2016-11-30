<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Exibir Pedido</h1>
                <form role="form" action="index.php?local=pedido&acao=atualizar" method="post">
                    <hr/>

                    <div id="divPedidos">
                    <?php $contador = 1; ?>
                    <?php foreach($pedido->getItens() as $index=>$item): ?>
                        <h3 >Item<?php echo $index + 1;?></h3>
                        <div >
                            <div class="form-group col-md-8">
                                <label>Produto</label>
                                <select class="form-control" name="produtoId<?php echo $index + 1;?>" disabled >
                                    <option value=""> <?php echo $item->getProduto()->getNome(); ?> </option>
                                </select>
                            </div>  
                            <div class="form-group col-md-2">
                                <label>Quantidade</label>
                                <input class="form-control" placeholder="" name="quantidade<?php echo $contador;?>" id="quantidade<?php echo $contador;?>" type="number" value="<?php echo $item->getQuantidade();?>" disabled>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Valor Unt.</label>
                                <input class="form-control" placeholder="" name="valorProduto<?php echo $contador;?>" id="valorProduto<?php echo $contador;?>" type="number" value="<?php echo $item->getValor();?>" disabled>
                            </div >
                        </div>
                        <input type="hidden" name="itemId<?php echo $contador;?>" value="<?php echo $item->getId();?>" disabled>
                    <?php $contador++; ?>    
                    <?php endforeach; ?>
                    </div>
                    <div class="form-group">
                        <label>Transportadora</label>
                        <select class="form-control" name="transportadora" disabled>
                            <option> <?php echo $pedido->getTransportadora()->getNome(); ?> </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Valor do Frete</label>
                        <input class="form-control" placeholder="" name="valorFrete" type="number" value="<?php echo $pedido->getValorFrete();?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Desconto</label>
                        <input class="form-control" placeholder="" name="valorDesconto" id="valorDesconto" value="<?php echo $pedido->getDesconto();?>" type="number" disabled>
                    </div>
                    <div class="form-group">
                        <label>Valor Total</label>
                        <input class="form-control" value="<?php echo $pedido->getValorTotal();?>" name="valorTotal" id="valorTotal" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nota Friscal</label>
                        <input class="form-control" value="<?php echo $pedido->getNotaFiscal();?>" name="notaFiscal" disabled>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </div>
</div>