<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Editar Pedido</h1>
                <form role="form" action="index.php?local=pedido&acao=atualizar" method="post">
                    <hr/>

                    <div id="divPedidos">
                    <?php $contador = 1; ?>
                    <?php foreach($pedido->getItens() as $index=>$item): ?>
                    
                        <h3 >Item<?php echo $index + 1;?></h3>
                        <div >
                            <div class="form-group col-md-8">
                                <label>Produto</label>
                                <select class="form-control" name="produtoId<?php echo $index + 1;?>">
                                    <?php foreach($produtos as $index=>$produto): ?>
                                    <option value="<?php echo $produto->getId(); ?>"> <?php echo $produto->getNome(); ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>  
                            <div class="form-group col-md-2">
                                <label>Quantidade</label>
                                <input class="form-control" placeholder="" name="quantidade<?php echo $contador;?>" id="quantidade<?php echo $contador;?>" type="number" value="<?php echo $item->getQuantidade();?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Valor Unt.</label>
                                <input class="form-control" placeholder="" name="valorProduto<?php echo $contador;?>" id="valorProduto<?php echo $contador;?>" type="number" value="<?php echo $item->getValor();?>">
                            </div >
                        </div>
                        <input type="hidden" name="itemId<?php echo $contador;?>" value="<?php echo $item->getId();?>">
                    <?php $contador++; ?>    
                    <?php endforeach; ?>
                    </div>

                    <div class="form-group">
                        <label>Transportadora</label>
                        <select class="form-control" name="transportadora">
                            <?php foreach($transportadoras as $index=>$transportadora): ?>
                            <option value="<?php echo $transportadora->getId(); ?>"> <?php echo $transportadora->getNome(); ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Valor do Frete</label>
                        <input class="form-control" placeholder="" name="valorFrete" type="number" value="<?php echo $pedido->getValorFrete();?>">
                    </div>
                    <div class="form-group">
                        <label>Desconto</label>
                        <input class="form-control" placeholder="" name="valorDesconto" id="valorDesconto" value="<?php echo $pedido->getDesconto();?>" type="number">
                    </div>
                    <div class="form-group">
                        <label>Valor Total</label>
                        <input class="form-control" value="<?php echo $pedido->getValorTotal();?>" name="valorTotal" id="valorTotal" >
                    </div>
                    <div class="form-group">
                        <label>Nota Friscal</label>
                        <input class="form-control" value="<?php echo $pedido->getNotaFiscal();?>" name="notaFiscal" >
                    </div>
                    <br/>
                    <br/>                     
                    <input type="hidden" name="local" value="pedido">
                    <input type="hidden" name="acao" value="atualizar">
                    <input type="hidden" name="pedidoId" value="<?php echo $pedido->getId();?>">
                    <input type="hidden" name="itemContador" id="itemContador" value="<?php echo $contador;?>">
                    <button type="submit" class="btn btn-default">Editar</button>
                    <button type="reset" class="btn btn-default">Limpar Campos</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<script type="text/javascript">
    var transportadoras = [
        <?php foreach($transportadoras as $index=>$transportadora): ?>
        {
            id : "<?php echo $transportadora->getId();?> ",
            nome : "<?php echo $transportadora->getNome();?> "
        }<?php if($index!=sizeof($transportadoras) - 1 )echo ","; ?>
        <?php endforeach; ?>
    ];

    var produtos = [
        <?php foreach($produtos as $index=>$produto): ?>
        {
            id : "<?php echo $produto->getId(); ?>",
            nome : "<?php echo $produto->getNome(); ?>"
        }<?php if($index!=sizeof($produtos) - 1 )echo ","; ?>
        <?php endforeach; ?>
    ];

    var itemContador = <?php echo $contador;?> -1;
    var valorTotalSemDesconto = 0;
    var valorTotal = 0;
    var valorDesconto = 0;

    var calcularValorTotal= function(){
        valorDesconto = parseFloat($("#valorDesconto").val());
        valorTotalSemDesconto = 0;
        for(var i = 1; i <= itemContador; i++ ){
            var valorProdutoN = parseFloat($("#valorProduto"+i).val());
            var quantidadeProdutoN = parseFloat($("#quantidade"+i).val());
            valorTotalSemDesconto += valorProdutoN*quantidadeProdutoN;
            valorTotal = valorTotalSemDesconto - valorDesconto;
            console.log("valorProdutoN"+valorProdutoN);
            console.log("quantidadeProdutoN"+quantidadeProdutoN);
            console.log("valorTotalSemDesconto"+valorTotalSemDesconto);
            console.log("valorDesconto"+valorDesconto);
            console.log("valorTotal"+valorTotal);
            $("#valorTotal").val( valorTotal );
        }
    };


    $("input").on( 'change', calcularValorTotal);

</script>