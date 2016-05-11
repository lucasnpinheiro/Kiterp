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
                    echo $this->Form->input('pessoa_id', ['options' => $vendedor, 'empty' => true, 'label' => false, 'placeholder' => 'Operador']);
                    echo $this->Form->input('terminal_id', ['options' => $terminais, 'empty' => true, 'label' => false, 'placeholder' => 'Terminal']);
                    echo $this->Form->data('data', ['label' => false, 'placeholder' => 'Data']);
                    echo $this->Form->button('', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>

                            <tr>
                                <th><?= $this->Paginator->sort('data') ?></th>
                                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                                <th><?= $this->Paginator->sort('terminal_id') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($caixasDiarios as $caixasDiario): ?>
                                <tr>
                                    <td><?= h($caixasDiario->data) ?></td>
                                    <td><?= $this->Html->link($caixasDiario->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'edit', $caixasDiario->pessoa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= $this->Html->link($caixasDiario->terminai->nome, ['controller' => 'Terminais', 'action' => 'edit', $caixasDiario->terminai->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= h($caixasDiario->created) ?></td>
                                    <td><?= h($caixasDiario->modified) ?></td>
                                    <td class="actions">
                                        <?php
                                        echo $this->Html->linkPermissao(null, ['action' => 'edit', $caixasDiario->id], ['title' => __('Edit')]);
                                        echo $this->Html->linkPermissao(null, ['controller' => 'CaixasMovimentos', 'action' => 'index', $caixasDiario->id], ['icon' => 'list', 'class' => ' btn-info btn btn-xs ', 'title' => __('Movimentos')]);
                                        echo $this->Html->linkPermissao(null, ['controller' => 'CaixasMovimentos', 'action' => 'fechar', $caixasDiario->id], ['icon' => 'calculator', 'class' => ' btn-default btn btn-xs ', 'title' => __('Relatorio de Fechamento')]);
                                        echo $this->Form->postLink(null, ['action' => 'delete', $caixasDiario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $caixasDiario->id), 'title' => __('Delete')]);
                                        ?>
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
