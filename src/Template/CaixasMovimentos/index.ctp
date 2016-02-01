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
                    echo $this->Form->input('caixa_diario_id', ['label' => false, 'placeholder' => 'Caixa']);
                    echo $this->Form->input('data_movimento', ['label' => false, 'placeholder' => 'Data do Movimento']);
                    echo $this->Form->input('numero_documento', ['label' => false, 'placeholder' => 'Número do Documento']);
                    echo $this->Form->input('tipo_lancamento', ['label' => false, 'placeholder' => 'Tipo de Lançamento']);
                    echo $this->Form->input('modalidade', ['label' => false, 'placeholder' => 'Modalidade']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('caixa_diario_id') ?></th>
                                <th><?= $this->Paginator->sort('data_movimento') ?></th>
                                <th><?= $this->Paginator->sort('numero_documento') ?></th>
                                <th><?= $this->Paginator->sort('tipo_lancamento') ?></th>
                                <th><?= $this->Paginator->sort('valor') ?></th>
                                <th><?= $this->Paginator->sort('modalidade') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($caixasMovimentos as $caixasMovimento): ?>
                                <tr>
                                    <td><?= $this->Number->format($caixasMovimento->id) ?></td>
                                    <td><?= $this->Number->format($caixasMovimento->caixa_diario_id) ?></td>
                                    <td><?= h($caixasMovimento->data_movimento) ?></td>
                                    <td><?= h($caixasMovimento->numero_documento) ?></td>
                                    <td><?= $this->Number->format($caixasMovimento->tipo_lancamento) ?></td>
                                    <td><?= $this->Number->format($caixasMovimento->valor) ?></td>
                                    <td><?= $this->Number->format($caixasMovimento->modalidade) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link('Alterar', ['action' => 'edit', $caixasMovimento->id]) ?>
                                            <?= $this->Form->postLink('Excluir', ['action' => 'delete', $caixasMovimento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasMovimento->id)]) ?>
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
