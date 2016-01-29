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

                    echo $this->Form->empresas('empresa_id', ['label' => false, 'placeholder' => 'Empresa']);
                    echo $this->Form->input('pessoa_id', ['label' => false, 'placeholder' => 'Cliente', 'options' => $pessoas, 'empty' => 'Selecione um Cliente']);
                    echo $this->Form->input('vendedor_id', ['label' => false, 'placeholder' => 'Vendedor', 'options' => $vendedors, 'empty' => 'Selecione um Vendedor']);
                    echo $this->Form->statusPedido('status', ['label' => false, 'placeholder' => 'Situação']);
                    echo $this->Form->data('data_pedido', ['label' => false, 'placeholder' => 'Data do Pedido']);
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
                                <th><?= $this->Paginator->sort('valor_total', 'Total') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedidos as $pedido): ?>
                                <tr>
                                    <td><?= $this->Number->format($pedido->id) ?></td>
                                    <td><?= $this->Html->link($pedido->empresa->pessoa->nome, ['controller' => 'Empresas', 'action' => 'edit', $pedido->empresa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= h($pedido->data_pedido) ?></td>
                                    <td><?= $this->Html->statusPedido($pedido->status) ?></td>
                                    <td><?= $this->Html->link($pedido->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'edit', $pedido->pessoa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= $this->Html->moeda($pedido->valor_total) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?php
                                            if ($pedido->status == 1 OR $pedido->status == 4 OR $pedido->status == 2) {
                                                echo $this->Html->link('Alterar', ['action' => 'edit', $pedido->id]);
                                            }
                                            if ($pedido->status == 2 OR $pedido->status == 7) {
                                                echo $this->Html->link('Receber', ['action' => 'receber', $pedido->id], ['class' => ' btn-info  btn btn-xs ', 'icon' => 'money']);
                                            }
                                            ?>
                                            <?= $this->Form->postLink('Cancelar', ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?>
                                        </div>
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