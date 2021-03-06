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
                    echo $this->Form->button('', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('codigo_banco') ?></th>
                                <th><?= $this->Paginator->sort('nome') ?></th>
                                <th><?= $this->Paginator->sort('agencia') ?></th>
                                <th><?= $this->Paginator->sort('conta_corrente') ?></th>
                                <th><?= $this->Paginator->sort('sequencial_arquivo') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bancos as $banco): ?>
                                <tr>
                                    <td><?= $this->Number->format($banco->codigo_banco) ?></td>
                                    <td><?= h($banco->nome) ?></td>
                                    <td><?= h($banco->agencia) ?></td>
                                    <td><?= h($banco->conta_corrente) ?></td>
                                    <td><?= $this->Number->format($banco->sequencial_arquivo) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('', ['action' => 'edit', $banco->id]) ?>
                                        <?= $this->Form->postLink('', ['action' => 'delete', $banco->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $banco->id)]) ?>
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
