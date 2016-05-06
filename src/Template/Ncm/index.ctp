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
                    echo $this->Form->input('ncm', ['label' => false, 'placeholder' => 'NCM']);
                    echo $this->Form->input('nome', ['label' => false, 'placeholder' => 'Nome']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('ncm') ?></th>
                                <th><?= $this->Paginator->sort('nome') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ncm as $ncm): ?>
                                <tr>
                                    <td><?= $this->Number->format($ncm->id) ?></td>
                                    <td><?= h($ncm->ncm) ?></td>
                                    <td><?= h($ncm->nome) ?></td>
                                    <td><?= h($ncm->created) ?></td>
                                    <td><?= h($ncm->modified) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link('', ['action' => 'edit', $ncm->id]) ?>
                                            <?= $this->Form->postLink('', ['action' => 'delete', $ncm->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $ncm->id)]) ?>
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