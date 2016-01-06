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
                    echo $this->Form->input('ncm_id', ['label' => false, 'placeholder' => 'NCM']);
                    echo $this->Form->input('icms_estadual_id', ['label' => false, 'placeholder' => 'ICMS Estatual']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('ncm_id') ?></th>
                                <th><?= $this->Paginator->sort('icms_estadual_id') ?></th>
                                <th><?= $this->Paginator->sort('iva') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ncmIva as $ncmIva): ?>
                                <tr>
                                    <td><?= $this->Number->format($ncmIva->id) ?></td>
                                    <td><?= $this->Number->format($ncmIva->ncm_id) ?></td>
                                    <td><?= $this->Number->format($ncmIva->icms_estadual_id) ?></td>
                                    <td><?= $this->Number->format($ncmIva->iva) ?></td>
                                    <td><?= h($ncmIva->created) ?></td>
                                    <td><?= h($ncmIva->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('Alterar', ['action' => 'edit', $ncmIva->id]) ?>
                                        <?= $this->Form->postLink('Excluir', ['action' => 'delete', $ncmIva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ncmIva->id)]) ?>
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