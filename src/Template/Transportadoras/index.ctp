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
                    echo $this->Form->input('cnpj', ['label' => false, 'placeholder' => 'CNPJ']);
                    echo $this->Form->button('', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('nome') ?></th>
                                <th><?= $this->Paginator->sort('contado') ?></th>
                                <th><?= $this->Paginator->sort('telefone1') ?></th>
                                <th><?= $this->Paginator->sort('telefone2') ?></th>
                                <th><?= $this->Paginator->sort('cnpj') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transportadoras as $transportadora): ?>
                                <tr>
                                    <td><?= h($transportadora->nome) ?></td>
                                    <td><?= h($transportadora->contado) ?></td>
                                    <td><?= h($transportadora->telefone1) ?></td>
                                    <td><?= h($transportadora->telefone2) ?></td>
                                    <td><?= h($transportadora->cnpj) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('', ['action' => 'edit', $transportadora->id]) ?>
                                        <?= $this->Form->postLink('', ['action' => 'delete', $transportadora->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $transportadora->id)]) ?>
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