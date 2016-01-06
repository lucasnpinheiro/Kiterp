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
                    echo $this->Form->input('estado', ['label' => false, 'placeholder' => 'Estado']);
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
                                <th><?= $this->Paginator->sort('estado') ?></th>
                                <th><?= $this->Paginator->sort('nome') ?></th>
                                <th><?= $this->Paginator->sort('icms_interno') ?></th>
                                <th><?= $this->Paginator->sort('icms_externo') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($icmsEstaduais as $icmsEstaduai): ?>
                                <tr>
                                    <td><?= $this->Number->format($icmsEstaduai->id) ?></td>
                                    <td><?= h($icmsEstaduai->estado) ?></td>
                                    <td><?= h($icmsEstaduai->nome) ?></td>
                                    <td><?= $this->Number->format($icmsEstaduai->icms_interno) ?></td>
                                    <td><?= $this->Number->format($icmsEstaduai->icms_externo) ?></td>
                                    <td><?= h($icmsEstaduai->created) ?></td>
                                    <td><?= h($icmsEstaduai->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('Alterar', ['action' => 'edit', $icmsEstaduai->id]) ?>
                                        <?= $this->Form->postLink('Excluir', ['action' => 'delete', $icmsEstaduai->id], ['confirm' => __('Are you sure you want to delete # {0}?', $icmsEstaduai->id)]) ?>
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