<div style="max-height: 300px; overflow: auto;">
    <table class="table table-bordered table-condensed table-hover table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor Unitario</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody class="lista-itens-pedidos">
            <tr>
                <td>
                    <?php echo $this->Form->input('Produto.0.produto_id', ['class' => 'desc-produto-id', 'type' => 'hidden']); ?>
                    <?php echo $this->Form->input('Produto.0.codigo', ['label' => false, 'class' => 'input-sm busca-produto desc-codigo', 'append' => false, 'maxlength' => 32, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?>
                </td>
                <td><?php echo $this->Form->input('Produto.0.nome', ['label' => false, 'class' => 'input-sm desc-nome', 'disabled' => true, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?></td>
                <td><?php echo $this->Form->numero('Produto.0.quantidade', ['label' => false, 'class' => 'input-sm desc-quantidade', 'append' => false, 'maxlength' => 10, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?></td>
                <td><?php echo $this->Form->moeda('Produto.0.valor_unitatio', ['label' => false, 'class' => 'input-sm calcula-linha desc-valor-unitario', 'append' => false, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?></td>
                <td><?php echo $this->Form->moeda('Produto.0.valor_total', ['label' => false, 'class' => 'input-sm desc-valor-total', 'disabled' => true, 'append' => false, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?></td>
            </tr>
        </tbody>
    </table>
</div>