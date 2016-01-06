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
                    echo $this->Form->input('nome', ['label' => false, 'placeholder' => 'Nome']);
                    echo $this->Form->input('abreviado', ['label' => false, 'placeholder' => 'Abreviado']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('nome') ?></th>
                                <th><?= $this->Paginator->sort('abreviado') ?></th>
                                <th><?= $this->Paginator->sort('qtde_dias') ?></th>
                                <th><?= $this->Paginator->sort('qtde_taxas') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($formasPagamentos as $formasPagamento): ?>
                                <tr>
                                    <td><?= $this->Number->format($formasPagamento->id) ?></td>
                                    <td><?= h($formasPagamento->nome) ?></td>
                                    <td><?= h($formasPagamento->abreviado) ?></td>
                                    <td><?= $this->Number->format($formasPagamento->qtde_dias) ?></td>
                                    <td><?= $this->Number->format($formasPagamento->qtde_taxas) ?></td>
                                    <td><?= h($formasPagamento->created) ?></td>
                                    <td><?= h($formasPagamento->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('Alterar', ['action' => 'edit', $formasPagamento->id]) ?>
                                        <?= $this->Form->postLink('Excluir', ['action' => 'delete', $formasPagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formasPagamento->id)]) ?>
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
