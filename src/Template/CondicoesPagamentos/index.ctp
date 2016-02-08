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
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('nome') ?></th>
                                <th><?= $this->Paginator->sort('qtde_parcelas', 'Parcelas') ?></th>
                                <th><?= $this->Paginator->sort('qtde_dias', 'Dias corridos') ?></th>
                                <th><?= $this->Paginator->sort('avista', 'Entrada da primeira parcela') ?></th>
                                <th><?= $this->Paginator->sort('parcelas') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($condicoesPagamentos as $condicoesPagamento): ?>
                                <tr>
                                    <td><?= h($condicoesPagamento->nome) ?></td>
                                    <td><?= $this->Number->format($condicoesPagamento->qtde_parcelas) ?></td>
                                    <td><?= $this->Number->format($condicoesPagamento->qtde_dias) ?></td>
                                    <td><?= $this->Html->simNao($condicoesPagamento->avista) ?></td>
                                    <td><?= (!empty($condicoesPagamento->parcelas) ? implode(' / ', unserialize($condicoesPagamento->parcelas)) : '') ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link('Alterar', ['action' => 'edit', $condicoesPagamento->id]) ?>
                                            <?= $this->Form->postLink('Excluir', ['action' => 'delete', $condicoesPagamento->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $condicoesPagamento->id)]) ?>
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