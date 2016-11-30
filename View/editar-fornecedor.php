<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Editar Fornecedor</h1>
                <form role="form" action="index.php?local=fornecedor&acao=atualizar" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" placeholder="" name="nome" value="<?php echo $fornecedor->getNome();?>">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input class="form-control" placeholder="" name="descricao" value="<?php echo $fornecedor->getDescricao()?>">
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="" name="endereco" value="<?php echo $fornecedor->getEndereco()?>">
                    </div>
                    <div class="form-group">
                        <label>Cidade</label>
                        <input class="form-control" placeholder="" name="cidade" value="<?php echo $fornecedor->getCidade()?>">
                    </div>
                    <div class="form-group">
                        <label>Bairro</label>
                        <input class="form-control" placeholder="" name="bairro" value="<?php echo $fornecedor->getBairro()?>">
                    </div>
                    <div class="form-group">
                        <label>Número</label>
                        <input class="form-control" placeholder="" type="number" name="numero" value="<?php echo $fornecedor->getNumero()?>">
                    </div>


                    <?php $ct = 0;?>
                    <?php foreach($fornecedor->getTelefones() as $telefone):?>
                    <?php $ct++;?>
                    <div id="telefones">
                        <div class="form-group">
                            <label>Telefone<?php echo $ct; ?></label>
                            <input class="form-control" placeholder="ddd" type="number" name="ddd<?php echo $ct; ?>" value="<?php echo $telefone->getDdd()?>">
                            <input class="form-control" placeholder="numero" type="tel" name="numero<?php echo $ct; ?>" value="<?php echo $telefone->getNumero()?>">
                            <input class="form-control" placeholder="referencia" name="referenciatelefone<?php echo $ct; ?>" value="<?php echo $telefone->getReferencia()?>">

                            <input type="hidden" name="idtelefone<?php echo $ct; ?>" value="<?php echo $telefone->getId()?>">
                        </div>
                    </div>
                    <?php endforeach; ?>


                    <?php $ce = 0;?>
                    <?php foreach($fornecedor->getEmails() as $email):?>
                    <?php $ce++;?>
                    <div id="emails">
                        <div class="form-group">
                            <label>Email<?php echo $ce; ?></label>

                            <input class="form-control" placeholder="email" type="email" name="email<?php echo $ce; ?>" value="<?php echo $email->getEmail()?>">

                            <input class="form-control" placeholder="referencia" name="referenciaemail<?php echo $ce; ?>" value="<?php echo $email->getReferencia()?>">

                            <input type="hidden" name="idemail<?php echo $ce; ?>" value="<?php echo $email->getId()?>">
                        </div>
                    </div>

                    
                    <?php endforeach; ?>

                    <br/>
                    <br/>
                    <input type="hidden" name="idfornecedor" value="<?php echo $fornecedor->getId()?>">
                    <input type="hidden" name="telefonesContador" id="telefonesContador" value="<?php echo $ct?>">
                    <input type="hidden" name="emailsContador" id="emailsContador" value="<?php echo $ce?>">
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
            '<input class="form-control" placeholder="referencia" name="referencia'+telefonesContador+'">'+
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
            '<input class="form-control" placeholder="referencia" name="referencia'+emailsContador+'">'+
        '</div>';
        $("#emailsContador").val(emailsContador);
        $("#emails").append(html);
    });
    
    
</script>