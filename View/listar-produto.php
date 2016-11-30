<div class="col-lg-12">
    <h2>Produtos</h2>
     <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Fornecedor</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produtos as $produto): ?>
                    <tr>
                        <td><?php echo $produto->getNome(); ?></td>
                        <td><?php echo $produto->getDescricao(); ?></td>
                        <td><?php echo $produto->getFornecedor()->getNome(); ?></td>
                        <td>
                            <a href="index.php?local=produto&acao=atualizar&id=<?php echo $produto->getId();?>">Editar</a>  |  
                            <a href="index.php?local=produto&acao=deletar&id=<?php echo $produto->getId();?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>