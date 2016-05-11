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
                    echo $this->Form->empresas('empresa_id', ['label' => false, 'placeholder' => 'Empresa']);
                    echo $this->Form->input('pessoa_id', ['label' => false, 'placeholder' => 'Cliente']);
                    echo $this->Form->data('data_emissao', ['label' => false, 'placeholder' => 'Data']);
                    echo $this->Form->numero('numero_nota_fiscal', ['label' => false, 'placeholder' => 'Número da Nota']);
                    echo $this->Form->button('', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('empresa_id') ?></th>
                                <th><?= $this->Paginator->sort('numero_nota_fiscal') ?></th>
                                <th><?= $this->Paginator->sort('serie') ?></th>
                                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                                <th><?= $this->Paginator->sort('cfop_id') ?></th>
                                <th><?= $this->Paginator->sort('data_emissao') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($notasFiscaisEntradas as $notasFiscaisEntrada): ?>
                                <tr>
                                    <td><?= $notasFiscaisEntrada->has('empresa') ? $this->Html->link($notasFiscaisEntrada->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $notasFiscaisEntrada->empresa->id]) : '' ?></td>
                                    <td><?= $this->Number->format($notasFiscaisEntrada->numero_nota_fiscal) ?></td>
                                    <td><?= h($notasFiscaisEntrada->serie) ?></td>
                                    <td><?= $notasFiscaisEntrada->has('pessoa') ? $this->Html->link($notasFiscaisEntrada->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'view', $notasFiscaisEntrada->pessoa->id]) : '' ?></td>
                                    <td><?= $this->Number->format($notasFiscaisEntrada->cfop_id) ?></td>
                                    <td><?= h($notasFiscaisEntrada->data_emissao) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('', ['action' => 'edit', $notasFiscaisEntrada->id]) ?>
                                        <?= $this->Form->postLink('', ['action' => 'delete', $notasFiscaisEntrada->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notasFiscaisEntrada->id)]) ?>
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