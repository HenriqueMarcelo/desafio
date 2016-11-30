<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Cadastro de Produto</h1>
                <form role="form" action="index.php?local=produto&acao=criar" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" placeholder="" name="nome">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input class="form-control" placeholder="" name="descricao">
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
                    <input type="hidden" name="local" value="produto">
                    <input type="hidden" name="acao" value="criar">
                    <button type="submit" class="btn btn-default">Cadastrar</button>
                    <button type="reset" class="btn btn-default">Limpar Campos</button>
                </form>
            </div>
        </div>
    </div>
</div>