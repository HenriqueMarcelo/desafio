<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Cadastro de Fornecedor</h1>
                <form role="form" action="index.php?local=fornecedor&acao=criar" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <p class="form-control-static"><?php echo $fornecedor->getNome()?></p>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <p class="form-control-static"><?php echo $fornecedor->getDescricao()?></p>
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <p class="form-control-static"><?php echo $fornecedor->getEndereco()?></p>
                    </div>
                    <div class="form-group">
                        <label>Cidade</label>
                        <p class="form-control-static"><?php echo $fornecedor->getCidade()?></p>
                    </div>
                    <div class="form-group">
                        <label>Bairro</label>
                        <p class="form-control-static"><?php echo $fornecedor->getBairro()?></p>
                    </div>
                    <div class="form-group">
                        <label>Número</label>
                        <p class="form-control-static"><?php echo $fornecedor->getNumero()?></p>
                    </div>
                    <?php $c = 1;?>
                    <?php foreach($fornecedor->getTelefones() as $telefone):?>
                    <div >
                        <div class="form-group">
                            <label>Telefone<?php echo $c; ?></label>
                            <br/>
                            <p class="form-control-static">(<?php echo $telefone->getDdd()?>) <?php echo $telefone->getNumero()?></p>
                            <p class="help-block">Referência</p>
                            <p class="form-control-static"><?php echo $telefone->getReferencia()?></p>
                        </div>
                    </div>
                    <?php $c++;?>
                    <?php endforeach; ?>

                    <?php $cc = 1;?>
                    <?php foreach($fornecedor->getEmails() as $email):?>
                    <div id="emails">
                        <div class="form-group">
                            <label>Email<?php echo $cc; ?></label>
                            <p class="form-control-static"><?php echo $email->getEmail()?></p>
                            <p class="help-block">Referência</p>
                            <p class="form-control-static"><?php echo $email->getReferencia()?></p>
                        </div>
                    </div>
                    <?php $cc++;?>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>
</div>