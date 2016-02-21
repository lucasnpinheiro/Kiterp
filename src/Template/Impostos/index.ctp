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
                    echo $this->Form->input('codigo', ['label' => false, 'placeholder' => 'Código']);
                    echo $this->Form->input('nome', ['label' => false, 'placeholder' => 'Nome']);
                    echo $this->Form->input('tipo_imposto', ['label' => false, 'placeholder' => 'Tipo de Imposto']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('tipo_imposto') ?></th>
                                <th><?= $this->Paginator->sort('codigo') ?></th>
                                <th><?= $this->Paginator->sort('nome') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($impostos as $imposto): ?>
                                <tr>
                                    <td><?= $this->Html->tipoImpostos($imposto->tipo_imposto) ?></td>
                                    <td><?= h($imposto->codigo) ?></td>
                                    <td><?= h($imposto->nome) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link('Alterar', ['action' => 'edit', $imposto->id]) ?>
                                            <?= $this->Form->postLink('Excluir', ['action' => 'delete', $imposto->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $imposto->id)]) ?>
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
