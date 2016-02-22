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
                    echo $this->Form->numero('numero_documento', ['label' => false, 'placeholder' => 'Número do Documento']);
                    echo $this->Form->data('data_vencimento', ['label' => false, 'placeholder' => 'Data de Vencimento']);
                    echo $this->Form->input('pessoa_id', ['empty' => 'Selecione um Cliente', 'label' => false, 'placeholder' => 'Cliente']);
                    echo $this->Form->input('banco_id', ['empty' => 'Selecione um Banco', 'label' => false, 'placeholder' => 'Banco']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('empresa_id') ?></th>
                                <th><?= $this->Paginator->sort('numero_documento', 'Doc./Parc.') ?></th>
                                <th><?= $this->Paginator->sort('data_vencimento', 'Vencimento') ?></th>
                                <th><?= $this->Paginator->sort('valor_documento', 'Valor') ?></th>
                                <th><?= $this->Paginator->sort('pessoa_id', 'Cliente') ?></th>
                                <th><?= $this->Paginator->sort('formas_pagamento_id') ?></th>
                                <th><?= $this->Paginator->sort('status', 'Situação') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contasReceber as $contasReceber): ?>
                                <tr>
                                    <td><?= $this->Html->link($contasReceber->empresa->pessoa->nome, ['controller' => 'Empresas', 'action' => 'edit', $contasReceber->empresa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= h($contasReceber->numero_documento) . '/' . h($contasReceber->parcelas) ?></td>
                                    <td><?= h($contasReceber->data_vencimento) ?></td>
                                    <td><?= $this->Html->moeda($contasReceber->valor_documento) ?></td>
                                    <td><?= $this->Html->link($contasReceber->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'edit', $contasReceber->pessoa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= $this->Html->link($contasReceber->formas_pagamento->nome, ['controller' => 'FormasPagamentos', 'action' => 'edit', $contasReceber->formas_pagamento->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= $this->Html->statusContas($contasReceber->status) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link('Baixa', ['action' => 'edit', $contasReceber->id, '?' => ['baixar' => 1]], ['class' => 'btn btn-info btn-xs', 'icon' => 'usd']) ?>
                                            <?= $this->Html->link('Alterar', ['action' => 'edit', $contasReceber->id, '?' => ['baixar' => 0]]) ?>
                                            <?= $this->Form->postLink('Excluir', ['action' => 'delete', $contasReceber->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $contasReceber->id)]) ?>
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