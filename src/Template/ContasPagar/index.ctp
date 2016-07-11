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
                    echo $this->Form->numero('numero_documento', ['label' => false, 'placeholder' => 'Número do Documento']);
                    echo $this->Form->data('data_vencimento', ['label' => false, 'placeholder' => 'Data de Vencimento']);
                    echo $this->Form->input('pessoa_id', ['label' => false, 'placeholder' => 'Fornecedor']);
                    echo $this->Form->input('banco_id', ['label' => false, 'placeholder' => 'Banco']);
                    echo $this->Form->button('', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('empresa_id') ?></th>
                                <th><?= $this->Paginator->sort('numero_documento') ?></th>
                                <th><?= $this->Paginator->sort('data_vencimento') ?></th>
                                <th><?= $this->Paginator->sort('valor_documento') ?></th>
                                <th><?= $this->Paginator->sort('pessoa_id', 'Fornecedor') ?></th>
                                <th><?= $this->Paginator->sort('banco_id') ?></th>
                                <th><?= $this->Paginator->sort('status', 'Situação') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contasPagar as $contasPagar): ?>
                                <tr>
                                    <td><?= $this->Html->link($contasPagar->empresa->pessoa->nome, ['controller' => 'Empresas', 'action' => 'edit', $contasPagar->empresa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= h($contasPagar->numero_documento) ?></td>
                                    <td><?= h($contasPagar->data_vencimento) ?></td>
                                    <td><?= $this->Html->moeda($contasPagar->valor_documento) ?></td>
                                    <td><?= $this->Html->link($contasPagar->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'edit', $contasPagar->pessoa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= $this->Html->link($contasPagar->banco->nome, ['controller' => 'Bancos', 'action' => 'edit', $contasPagar->banco->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= $this->Html->statusContas($contasPagar->status) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('', ['action' => 'edit', $contasPagar->id, '?' => ['baixar' => 1]], ['class' => 'btn btn-info btn-xs', 'icon' => 'usd']) ?>
                                        <?= $this->Html->link('', ['action' => 'edit', $contasPagar->id, '?' => ['baixar' => 0]]) ?>
                                        <?= $this->Form->postLink('', ['action' => 'delete', $contasPagar->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $contasPagar->id)]) ?>
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