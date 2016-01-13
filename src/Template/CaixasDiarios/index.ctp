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
                    echo $this->Form->input('numero_caixa', ['label' => false, 'placeholder' => 'Número do Caixa']);
                    echo $this->Form->input('operador', ['label' => false, 'placeholder' => 'Operador']);
                    echo $this->Form->input('data_abertura', ['label' => false, 'placeholder' => 'Data de Abertura']);
                    echo $this->Form->input('data_encerramento', ['label' => false, 'placeholder' => 'Data de Encerramento']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('numero_caixa') ?></th>
                                <th><?= $this->Paginator->sort('operador') ?></th>
                                <th><?= $this->Paginator->sort('data_abertura') ?></th>
                                <th><?= $this->Paginator->sort('data_encerramento') ?></th>
                                <th><?= $this->Paginator->sort('valor_inicial') ?></th>
                                <th><?= $this->Paginator->sort('total_entradas') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($caixasDiarios as $caixasDiario): ?>
                                <tr>
                                    <td><?= $this->Number->format($caixasDiario->numero_caixa) ?></td>
                                    <td><?= $this->Html->link($caixasDiario->operadore->nome, ['controller' => 'Pessoas', 'action' => 'edit', $caixasDiario->operadore->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= h($caixasDiario->data_abertura) ?></td>
                                    <td><?= h($caixasDiario->data_encerramento) ?></td>
                                    <td><?= $this->Html->moeda($caixasDiario->valor_inicial) ?></td>
                                    <td><?= $this->Html->moeda($caixasDiario->total_entradas) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->linkPermissao('Alterar', ['action' => 'edit', $caixasDiario->id]) ?>
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
