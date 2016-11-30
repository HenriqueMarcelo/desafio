<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Cadastro de Fornecedor</h1>
                <form role="form" action="index.php?local=fornecedor&acao=criar" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" placeholder="" name="nome">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input class="form-control" placeholder="" name="descricao">
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="" name="endereco">
                    </div>
                    <div class="form-group">
                        <label>Cidade</label>
                        <input class="form-control" placeholder="" name="cidade">
                    </div>
                    <div class="form-group">
                        <label>Bairro</label>
                        <input class="form-control" placeholder="" name="bairro">
                    </div>
                    <div class="form-group">
                        <label>Número</label>
                        <input class="form-control" placeholder="" name="numero">
                    </div>
                    <div id="telefones">
                        <div class="form-group">
                            <label>Telefone1</label>
                            <input class="form-control" placeholder="ddd" type="number" name="ddd1">
                            <input class="form-control" placeholder="numero" type="tel" name="numero1">
                            <input class="form-control" placeholder="referencia" name="referenciatelefone1">
                        </div>
                    </div>
                    <button type="button" class="btn btn-link" id="novoTelefone">Novo Telefone</button> 
                    <div id="emails">
                        <div class="form-group">
                            <label>Email 1</label>
                            <input class="form-control" placeholder="email" type="email" name="email1">
                            <input class="form-control" placeholder="referencia" name="referenciaemail1">
                        </div>
                    </div>
                    <button type="button" class="btn btn-link" id="novoEmail">Novo Email</button> 
                    <br/>
                    <br/>                     
                    <input type="hidden" name="local" value="fornecedor">
                    <input type="hidden" name="acao" value="criar">
                    <input type="hidden" name="telefonesContador" id="telefonesContador" value="1">
                    <input type="hidden" name="emailsContador" id="emailsContador" value="1">
                    <button type="submit" class="btn btn-default">Cadastrar</button>
                    <button type="reset" class="btn btn-default">Refazer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //Script Para captar os varios telefones e emails que podem ser cadastrados
    
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