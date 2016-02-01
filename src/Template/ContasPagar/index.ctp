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
                    echo $this->Form->input('numero_documento', ['label' => false, 'placeholder' => 'Número do Documento']);
                    echo $this->Form->input('data_vencimento', ['label' => false, 'placeholder' => 'Data de Vencimento']);
                    echo $this->Form->input('pessoa_id', ['label' => false, 'placeholder' => 'Cliente']);
                    echo $this->Form->input('banco_id', ['label' => false, 'placeholder' => 'Banco']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('empresa_id') ?></th>
                                <th><?= $this->Paginator->sort('numero_documento') ?></th>
                                <th><?= $this->Paginator->sort('data_vencimento') ?></th>
                                <th><?= $this->Paginator->sort('valor_documento') ?></th>
                                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                                <th><?= $this->Paginator->sort('banco_id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contasPagar as $contasPagar): ?>
                                <tr>
                                    <td><?= $this->Number->format($contasPagar->id) ?></td>
                                    <td><?= $this->Html->link($contasPagar->empresa->nome, ['controller' => 'Empresas', 'action' => 'edit', $contasPagar->empresa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= h($contasPagar->numero_documento) ?></td>
                                    <td><?= h($contasPagar->data_vencimento) ?></td>
                                    <td><?= $this->Number->format($contasPagar->valor_documento) ?></td>
                                    <td><?= $this->Html->link($contasPagar->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'edit', $contasPagar->pessoa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= $this->Html->link($contasPagar->banco->nome, ['controller' => 'Bancos', 'action' => 'edit', $contasPagar->banco->id], ['icon' => 'external-link-square']) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link('Alterar', ['action' => 'edit', $contasPagar->id]) ?>
                                            <?= $this->Form->postLink('Excluir', ['action' => 'delete', $contasPagar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contasPagar->id)]) ?>
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