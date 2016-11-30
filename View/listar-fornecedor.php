<div class="col-lg-12">
    <h2>Fornecedores</h2>
     <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fornecedores as $fornecedor): ?>
                    <tr>
                        <td>
                            <a href="index.php?local=fornecedor&acao=comId&id=<?php echo $fornecedor->getId();?>" >
                                <?php echo $fornecedor->getNome(); ?>
                            </a>
                        </td>
                        <td>
                            <a href="index.php?local=fornecedor&acao=atualizar&id=<?php echo $fornecedor->getId();?>">Editar</a>  |  
                            <a href="index.php?local=fornecedor&acao=deletar&id=<?php echo $fornecedor->getId();?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>