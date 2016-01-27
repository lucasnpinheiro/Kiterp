<div class="lista-itens-pedidos-clone">
    <?php echo $this->Form->input('Produto.0.produto_id', ['class' => 'input-sm desc-produto-id', 'type' => 'hidden']); ?>
    <?php echo $this->Form->input('Produto.0.codigo', ['label' => 'Código', 'class' => 'input-sm busca-produto-input desc-codigo', 'append' => false, 'maxlength' => 32, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-6']]); ?>
    <?php echo $this->Form->input('Produto.0.codigo', ['label' => 'Busca', 'class' => 'input-sm busca-produto desc-codigo', 'append' => false, 'maxlength' => 32, 'type' => 'select', 'empty' => 'Selecione um produto', 'div' => ['class' => 'col-xs-12 col-md-6']]); ?>
    <div class="clearfix"></div>
    <?php echo $this->Form->input('Produto.0.nome', ['label' => 'Nome', 'class' => 'input-sm desc-nome', 'disabled' => true, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-4']]); ?>
    <?php echo $this->Form->peso('Produto.0.quantidade', ['label' => 'Quantidade', 'class' => 'input-sm desc-quantidade', 'append' => false, 'maxlength' => 10, 'casas' => 4, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-4']]); ?>
    <?php echo $this->Form->moeda('Produto.0.valor_unitario', ['label' => 'Valor Unitario', 'class' => 'input-sm calcula-linha desc-valor-unitario', 'append' => false, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-4']]); ?>
</div>
<div class="clearfix"></div>
<div style="max-height: 300px; overflow: auto;">
    <table class="table table-bordered table-condensed table-hover table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Valor Unitario</th>
                <th>Valor Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="lista-itens-pedidos">
            <?php
            debug($pedido);
            if (isset($pedido->pedidos_itens) AND ! empty($pedido->pedidos_itens)) {
                foreach ($pedido->pedidos_itens as $key => $value) {
                    ?>
                    <tr>
                        <td>
                            <input name="Produto[<?php echo $key; ?>][produto_id]" value="<?php echo $value->produto_id; ?>" type="hidden">
                            <input name="Produto[<?php echo $key; ?>][nome]" value="<?php echo $value->produto_id; ?>" type="hidden">
                            <input name="Produto[<?php echo $key; ?>][barra]" value="<?php echo $value->produto_id; ?>" type="hidden">
                            <input name="Produto[<?php echo $key; ?>][quantidade]" value="<?php echo $value->qtd; ?>" type="hidden">
                            <input name="Produto[<?php echo $key; ?>][valor_unitario]" value="<?php echo $value->venda; ?>" type="hidden">
                            <input name="Produto[<?php echo $key; ?>][valor_total]" value="<?php echo $value->qtd * $value->venda; ?>" type="hidden">
                            ' + prod.barra + '
                        </td>
                        <td>' + prod.nome + '</td>
                        <td class="text-center"><?php echo $value->qtd; ?></td>
                        <td class="text-center"><?php echo $value->venda; ?></td>
                        <td class="text-center"><?php echo $value->qtd * $value->venda; ?></td>
                        <td class="text-center"><button type="button" class="btn btn-xs btn-danger remove-linha">X</button></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>