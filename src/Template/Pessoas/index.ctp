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
                    echo $this->Form->tipoPessoa('tipo_pessoa', ['label' => false, 'placeholder' => 'Tipo de Pessoa']);
                    echo $this->Form->status('status', ['label' => false, 'placeholder' => 'Situação']);
                    echo $this->Form->associacao('associacao', ['label' => false, 'placeholder' => 'Associação']);
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
                                <th><?= $this->Paginator->sort('tipo_pessoa') ?></th>
                                <th><?= $this->Paginator->sort('status') ?></th>
                                <th><?= $this->Paginator->sort('consumidor_final') ?></th>
                                <th><?= $this->Paginator->sort('tipo_contribuinte') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pessoas as $pessoa): ?>
                                <tr>
                                    <td><?= $this->Number->format($pessoa->id) ?></td>
                                    <td><?= h($pessoa->nome) ?></td>
                                    <td><?= $this->Html->tipoPessoa($pessoa->tipo_pessoa) ?></td>
                                    <td><?= $this->Html->status($pessoa->status) ?></td>
                                    <td><?= $this->Html->simNao($pessoa->consumidor_final) ?></td>
                                    <td><?= $this->Html->tipoContribuinte($pessoa->tipo_contribuinte) ?></td>
                                    <td><?= h($pessoa->created) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link('Alterar', ['action' => 'edit', $pessoa->id]) ?>
                                            <?= $this->Form->postLink('Excluir', ['action' => 'delete', $pessoa->id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $pessoa->id)]) ?>
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
