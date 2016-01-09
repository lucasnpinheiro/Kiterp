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
                    echo $this->Form->input('pessoa_id', ['label' => false, 'placeholder' => 'Empresa']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('pessoa_id') ?></th>
                                <th><?= $this->Paginator->sort('codigo_cidade') ?></th>
                                <th><?= $this->Paginator->sort('regime_tributario') ?></th>
                                <th><?= $this->Paginator->sort('versao_sefaz') ?></th>
                                <th><?= $this->Paginator->sort('perentual_tributo') ?></th>
                                <th><?= $this->Paginator->sort('hora_tzd') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($empresas as $empresa): ?>
                                <tr>
                                    <td><?= $this->Number->format($empresa->id) ?></td>
                                    <td><?= $this->Html->link($empresa->pessoa->nome, ['controller' => 'Pessoas', 'action' => 'edit', $empresa->pessoa->id], ['icon' => 'external-link-square']) ?></td>
                                    <td><?= h($empresa->codigo_cidade) ?></td>
                                    <td><?= $this->Html->simNao($empresa->regime_tributario) ?></td>
                                    <td><?= h($empresa->versao_sefaz) ?></td>
                                    <td><?= $this->Html->porcentagem($empresa->perentual_tributo) ?></td>
                                    <td><?= h($empresa->hora_tzd) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('Alterar', ['action' => 'edit', $empresa->id]) ?>
                                        <?= $this->Form->postLink('Excluir', ['action' => 'delete', $empresa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empresa->id)]) ?>
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