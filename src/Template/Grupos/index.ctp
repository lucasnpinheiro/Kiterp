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
                    echo $this->Form->input('status', ['label' => false, 'placeholder' => 'Situação']);
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
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($grupos as $grupo): ?>
                                <tr>
                                    <td><?= $this->Number->format($grupo->id) ?></td>
                                    <td><?= h($grupo->nome) ?></td>
                                    <td><?= $this->Number->format($grupo->status) ?></td>
                                    <td><?= h($grupo->created) ?></td>
                                    <td><?= h($grupo->modified) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link('', ['action' => 'edit', $grupo->id]) ?>
                                            <?= $this->Html->link('', ['action' => 'edit', $grupo->id]) ?>
                                            <?= $this->Form->postLink('', ['action' => 'delete', $grupo->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $grupo->id)]) ?>
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