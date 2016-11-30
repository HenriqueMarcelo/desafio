<div class="col-lg-12">
    <h2>Pedidos</h2>
     <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Transportadora</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pedidos as $pedido): ?>
                    <tr>
                        <td>
                        <a href="index.php?local=pedido&acao=comId&id=<?php echo $pedido->getId();?>" >
                            <?php echo date('d/m/Y H:i',$pedido->getDataHora()); ?>
                        </a>
                            
                        </td>
                        <td><?php echo $pedido->getTransportadora()->getNome(); ?></td>
                        <td>
                            <a href="index.php?local=pedido&acao=atualizar&id=<?php echo $pedido->getId();?>">Editar</a>  |  
                            <a href="index.php?local=pedido&acao=deletar&id=<?php echo $pedido->getId();?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>