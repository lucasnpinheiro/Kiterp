<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Consultar', null);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Lista de ' . $this->fetch('title')) ?></h5>
            </div>
            <div class="ibox-content">
                <div class="row text-right">
                    <?php
                    echo $this->Form->create(null, [
                        'inline' => true,
                        'label' => false
                    ]);
                    echo $this->Form->input('empresa_id', ['label' => false, 'placeholder' => 'Empresa']);
                    echo $this->Form->input('data_pedido', ['label' => false, 'placeholder' => 'Data do Pedido']);
                    echo $this->Form->input('pessoa_id', ['label' => false, 'placeholder' => 'Cliente']);
                    echo $this->Form->input('vendedor_id', ['label' => false, 'placeholder' => 'Vendedor']);
                    echo $this->Form->input('status', ['label' => false, 'placeholder' => 'Situação']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id', 'Pedido') ?></th>
                                <th><?= $this->Paginator->sort('empresa_id') ?></th>
                                <th><?= $this->Paginator->sort('data_pedido') ?></th>
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('pessoa_id', 'Cliente') ?></th>
                                <th><?= $this->Paginator->sort('condicao_pagamento_id') ?></th>
                                <th><?= $this->Paginator->sort('vendedor_id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedidos as $pedido):                                ?>
                                <tr>
                                    <td><?= $this->Number->format($pedido->id) ?></td>
                                    <td><?= $this->Html->link($pedido->empresa->pessoa->nome, ['controller' => 'Empresas', 'action' => 'edit', $pedido->empresa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= h($pedido->data_pedido) ?></td>
                                    <td><?= $this->Html->statusPedido($pedido->status) ?></td>
                                    <td><?= $this->Html->link($pedido->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'edit', $pedido->pessoa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= $this->Number->format($pedido->condicao_pagamento_id) ?></td>
                                    <td><?= $this->Html->link($pedido->vendedore->nome, ['controller' => 'Pessoas', 'action' => 'edit', $pedido->vendedore->id], ['icon' => 'external-link-square']) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('Alterar', ['action' => 'edit', $pedido->id]) ?>
                                        <?= $this->Form->postLink('Excluir', ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

<?php echo $this->element('Layout/paginacao'); ?>