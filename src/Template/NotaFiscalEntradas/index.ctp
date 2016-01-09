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
                    echo $this->Form->input('numero_nota_fiscal', ['label' => false, 'placeholder' => 'Número da Nota Fiscal']);
                    echo $this->Form->input('pessoa_id', ['label' => false, 'placeholder' => 'Cliente']);
                    echo $this->Form->input('data_emissao', ['label' => false, 'placeholder' => 'Data de Emissão']);
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
                                <th><?= $this->Paginator->sort('numero_nota_fiscal') ?></th>
                                <th><?= $this->Paginator->sort('serie') ?></th>
                                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                                <th><?= $this->Paginator->sort('cfop_id') ?></th>
                                <th><?= $this->Paginator->sort('data_emissao') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($notaFiscalEntradas as $notaFiscalEntrada): ?>
                                <tr>
                                    <td><?= $this->Number->format($notaFiscalEntrada->id) ?></td>
                                    <td><?= $this->Html->link($notaFiscalEntrada->empresa->nome, ['controller' => 'Empresas', 'action' => 'edit', $notaFiscalEntrada->empresa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= $this->Number->format($notaFiscalEntrada->numero_nota_fiscal) ?></td>
                                    <td><?= h($notaFiscalEntrada->serie) ?></td>
                                    <td><?= $this->Html->link($notaFiscalEntrada->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'edit', $notaFiscalEntrada->pessoa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= $this->Number->format($notaFiscalEntrada->cfop_id) ?></td>
                                    <td><?= h($notaFiscalEntrada->data_emissao) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('Alterar', ['action' => 'edit', $notaFiscalEntrada->id]) ?>
                                        <?= $this->Form->postLink('Excluir', ['action' => 'delete', $notaFiscalEntrada->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notaFiscalEntrada->id)]) ?>
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