<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Editar Transportadora</h1>
                <form role="form" action="index.php?local=transportadora&acao=atualizar" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" value="<?php echo $transportadora->getNome(); ?>" name="nome">
                    </div>
                    <br/>
                    <br/>
                    <input type="hidden" name="id" value="<?php echo $transportadora->getId(); ?>">                
                    <input type="hidden" name="local" value="transportadora">
                    <input type="hidden" name="acao" value="editar">
                    <button type="submit" class="btn btn-default">Editar</button>
                    <button type="reset" class="btn btn-default">Resetar</button>
                </form>
            </div>
        </div>
    </div>
</div>