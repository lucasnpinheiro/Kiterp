<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Consultar', null);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Lista de ' . $this->fetch('title')) . ' - ' . $tipo ?></h5>
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
                    echo $this->Form->input('tradutora', ['label' => false, 'placeholder' => 'Tradutora']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('codigo') ?></th>
                                <th><?= $this->Paginator->sort('nome') ?></th>
                                <th><?= $this->Paginator->sort('tipo') ?></th>
                                <th><?= $this->Paginator->sort('id_pai', 'Sub-Conta') ?></th>
                                <th><?= $this->Paginator->sort('tradutora') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($contas as $conta):
                                ?>
                                <tr>
                                    <td><?= h($conta->codigo) ?></td>
                                    <td><?= h($conta->nome) ?></td>
                                    <td><?= h($conta->tipo == 1 ? 'Credito' : 'Debito') ?></td>
                                    <td><?= h(!empty($conta->sub_conta->nome) ? $conta->sub_conta->nome : 'Principal') ?></td>
                                    <td><?= h($conta->tradutora) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link('Alterar', ['action' => 'edit', $conta->id, '?' => ['tipo' => $this->request->query('tipo')]]) ?>
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