<div class="col-lg-12">
    <h2>Transportadora</h2>
     <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($transportadoras as $transportadora): ?>
                    <tr>
                        <td><?php echo $transportadora->getNome(); ?></td>
                        <td>
                            <a href="index.php?local=transportadora&acao=atualizar&id=<?php echo $transportadora->getId();?>">Editar</a>  |  
                            <a href="index.php?local=transportadora&acao=deletar&id=<?php echo $transportadora->getId();?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>