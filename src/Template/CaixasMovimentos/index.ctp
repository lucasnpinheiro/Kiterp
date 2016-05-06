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
                    echo $this->Form->caixas('caixas_diario_id', ['empty' => true, 'label' => false, 'placeholder' => 'Operador']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('caixas_diario_id') ?></th>
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('valor') ?></th>
                                <th><?= $this->Paginator->sort('grupo_id') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($caixasMovimentos as $caixasMovimento):
                                ?>
                                <tr>
                                    <td><?= h($caixasMovimento->caixas_diario->data) . ' | ' . h($caixasMovimento->caixas_diario->pessoa->nome); ?></td>
                                    <td><?= $this->Html->statusMovimentos($caixasMovimento->status) ?></td>
                                    <td><?= $this->Html->moeda($caixasMovimento->valor) ?></td>
                                    <td><?= $this->Html->pagamentos($caixasMovimento->grupo_id) ?></td>
                                    <td><?= h($caixasMovimento->created) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('', ['action' => 'edit', $caixasMovimento->id]) ?>
                                        <?= $this->Form->postLink('', ['action' => 'delete', $caixasMovimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasMovimento->id)]) ?>
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
