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

        </tbody>
    </table>
</div>