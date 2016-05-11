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
                    echo $this->Form->input('barra', ['label' => false, 'placeholder' => 'Código de Barras']);
                    echo $this->Form->input('nome', ['label' => false, 'placeholder' => 'Nome']);
                    echo $this->Form->button('', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('foto') ?></th>
                                <th><?= $this->Paginator->sort('barra') ?></th>
                                <th><?= $this->Paginator->sort('nome') ?></th>
                                <th><?= $this->Paginator->sort('unidade') ?></th>
                                <th><?= $this->Paginator->sort('grupo_id') ?></th>
                                <th><?= $this->Paginator->sort('produto_kit') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto): ?>
                                <tr>
                                    <td><?= $this->Html->image($produto->foto, ['style' => 'max-height: 50px;', 'class' => 'img-responsive img-thumbnail']) ?></td>
                                    <td><?= h($produto->barra) ?></td>
                                    <td><?= h($produto->nome) ?></td>
                                    <td><?= h($produto->unidade) ?></td>
                                    <td><?= h(empty($produto->grupos_estoque->nome) ? 'Não informado' : $produto->grupos_estoque->nome) ?></td>
                                    <td><?= $this->Html->simNao($produto->produto_kit) ?></td>
                                    <td class="actions">
                                            <?= $this->Html->link('', ['action' => 'edit', $produto->id]) ?>
                                            <?= $this->Form->postLink('', ['action' => 'delete', $produto->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $produto->id)]) ?>
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
