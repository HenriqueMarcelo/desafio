<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Cadastro de Transportadora</h1>
                <form role="form" action="index.php?local=transportadora&acao=criar" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" placeholder="" name="nome">
                    </div>
                    
                    <br/>
                    <br/>                     
                    <input type="hidden" name="local" value="transportadora">
                    <input type="hidden" name="acao" value="criar">
                    <button type="submit" class="btn btn-default">Cadastrar</button>
                    <button type="reset" class="btn btn-default">Resetar</button>
                </form>
            </div>
        </div>
    </div>
</div>