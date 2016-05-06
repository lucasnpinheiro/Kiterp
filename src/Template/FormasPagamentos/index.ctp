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
                                <th><?= $this->Paginator->sort('grupo') ?></th>
                                <th><?= $this->Paginator->sort('qtde_dias') ?></th>
                                <th><?= $this->Paginator->sort('qtde_taxas') ?></th>
                                <th><?= $this->Paginator->sort('valor_taxas', 'Taxas') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($formasPagamentos as $formasPagamento): ?>
                                <tr>
                                    <td><?= $this->Number->format($formasPagamento->id) ?></td>
                                    <td><?= h($formasPagamento->nome) ?></td>
                                    <td><?= h($formasPagamento->abreviado) ?></td>
                                    <td><?= $this->Html->pagamentos($formasPagamento->grupo) ?></td>
                                    <td><?= $this->Number->format($formasPagamento->qtde_dias) ?></td>
                                    <td><?= $this->Number->format($formasPagamento->qtde_taxas) ?></td>
                                    <td><?= $this->Html->jsonToLista($formasPagamento->valor_taxas, $formasPagamento->qtde_taxas) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link('', ['action' => 'edit', $formasPagamento->id]) ?>
                                            <?= $this->Form->postLink('', ['action' => 'delete', $formasPagamento->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $formasPagamento->id)]) ?>
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
