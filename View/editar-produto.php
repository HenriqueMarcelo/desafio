<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Editar Produto</h1>
                <form role="form" action="index.php?local=produto&acao=atualizar" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" value="<?php echo $produto->getNome(); ?>" name="nome">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input class="form-control" value="<?php echo $produto->getDescricao(); ?>" name="descricao">
                    </div>
                    <div class="form-group">
                        <label>Fornecedor</label>
                        <select class="form-control" name="fornecedorId">
                        <?php foreach($fornecedores as $fornecedor): ?>
                            <option value="<?php echo $fornecedor->getId(); ?>">
                                <?php echo $fornecedor->getNome(); ?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <br/>
                    <br/>    
                    <input type="hidden" name="id" value="<?php echo $produto->getId(); ?>"> 
                    <input type="hidden" name="local" value="produto">
                    <input type="hidden" name="acao" value="atualizar">
                    <button type="submit" class="btn btn-default">Editar</button>
                    <button type="reset" class="btn btn-default">Limpar Campos</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
<script type="text/javascript">
    var telefonesContador = 1;
    var emailsContador = 1;
    
    $("#novoTelefone").click(function(){
        telefonesContador++;
        html = 
        '<div class="form-group">'+
            '<label>Telefone'+telefonesContador+'</label>'+
            '<input class="form-control" placeholder="ddd" type="number" name="ddd'+telefonesContador+'">'+
            '<input class="form-control" placeholder="numero" type="tel" name="numero'+telefonesContador+'">'+
            '<input class="form-control" placeholder="referencia" name="referenciatelefone'+telefonesContador+'">'+
        '</div>';
        $("#telefonesContador").val(telefonesContador);
        $("#telefones").append(html);
    });
    
    $("#novoEmail").click(function(){
        console.log("froiejhwei");
        emailsContador++;
        html = 
        '<div class="form-group">'+
            '<label>Email '+emailsContador+'</label>'+
            '<input class="form-control" placeholder="email" type="email" name="email'+emailsContador+'">'+
            '<input class="form-control" placeholder="referencia" name="referenciaemail'+emailsContador+'">'+
        '</div>';
        $("#emailsContador").val(emailsContador);
        $("#emails").append(html);
    });
    
    
</script>