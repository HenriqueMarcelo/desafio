<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Cadastro de Pedido</h1>
                <form role="form" action="index.php?local=pedido&acao=criar" method="post">
                    <hr/>

                    <div id="divPedidos">
                        <h3 >Item 1</h3>
                        <div >
                            <div class="form-group col-md-8">
                                <label>Produto</label>
                                <select class="form-control" name="produtoId1">
                                    <?php foreach($produtos as $index=>$produto): ?>
                                    <option value="<?php echo $produto->getId(); ?>"> <?php echo $produto->getNome(); ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>  
                            <div class="form-group col-md-2">
                                <label>Quantidade</label>
                                <input class="form-control" placeholder="" name="quantidade1" id="quantidade1" type="number" value="0">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Valor Unt.</label>
                                <input class="form-control" placeholder="" name="valorProduto1" id="valorProduto1" type="number" value="0">
                            </div >
                        </div>
                    </div>
                    

                    <button type="button" id="novoItem" style="margin-bottom: 10px"class="btn btn-default">Novo Item</button>

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
                        <input class="form-control" name="valorFrete" id="valorFrete" type="number" value="0">
                    </div>
                    <div class="form-group">
                        <label>Desconto</label>
                        <input class="form-control" name="valorDesconto" id="valorDesconto" value="0" type="number">
                    </div>
                    <div class="form-group">
                        <label>Valor Total</label>
                        <input class="form-control" value="0" name="valorTotal" id="valorTotal" >
                    </div>
                    <div class="form-group">
                        <label>Nota Friscal</label>
                        <input class="form-control" value="" name="notaFiscal" >
                    </div>
                    <br/>
                    <br/>                     
                    <input type="hidden" name="local" value="pedido">
                    <input type="hidden" name="acao" value="criar">
                    <input type="hidden" name="itemContador" id="itemContador" value="1">
                    <button type="submit" class="btn btn-default">Cadastrar</button>
                    <button type="reset" class="btn btn-default">Limpar Campos</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<script type="text/javascript">
    //Script para salvar no js as trasportadoras e produtos
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

    //Script para cuidar dos vários item que um pedido pode ter
    var itemContador = 1;
    var valorTotalSemDesconto = 0;
    var valorTotal = 0;
    var valorDesconto = 0;
    
    $("#novoItem").click(function(){
        itemContador++;
        htmlOptions = '';
        produtos.forEach(function(element, index, array){
            htmlOptions += '<option value="'+element.id+'">'+element.nome+'</option>';
        });
        html = 
        '<h3 >Item '+itemContador+'</h3>'+
        '<div>'+
            '<div class="form-group col-md-8">'+
                '<label>Produto</label>'+
                '<select class="form-control" name="produtoId'+itemContador+'" id="produtoId'+itemContador+'">';
                    html += htmlOptions;
        html += '</select>'+
            '</div>'+
            '<div class="form-group col-md-2">'+
                 '<label>Quantidade</label>'+
                  '<input class="form-control" placeholder="" name="quantidade'+itemContador+'" id="quantidade'+itemContador+'" type="number" value="0">'+
            ' </div>'+
            '<div class="form-group col-md-2">'+
                '<label>Valor Unt.</label>'+
                '<input class="form-control" placeholder="" name="valorProduto'+itemContador+'" id="valorProduto'+itemContador+'" type="number" value="0">'+
            '</div>'+
        '</div>';
        $("#itemContador").val(itemContador);
        $("#divPedidos").append(html);
    });

    var calcularValorTotal= function(){
        valorDesconto = parseFloat($("#valorDesconto").val());
        valorFrete = parseFloat($("#valorFrete").val());
        valorTotalSemDesconto = 0;
        for(var i = 1; i <= itemContador; i++ ){
            console.log("Teste"+itemContador);
            var valorProdutoN = parseFloat($("#valorProduto"+i).val());
            var quantidadeProdutoN = parseFloat($("#quantidade"+i).val());
            
            valorTotalSemDesconto += (valorProdutoN*quantidadeProdutoN);
            valorTotal = valorTotalSemDesconto - valorDesconto;

        }
        valorTotal += valorFrete;
        console.log(valorTotal);
        $("#valorTotal").val( valorTotal );
    };


    $("input").on('change', calcularValorTotal);

</script>