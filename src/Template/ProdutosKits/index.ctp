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
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('kit_id', 'Kit') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtosKits as $produtosKit): ?>
                                <tr>
                                    <td><?= $this->Html->link($produtosKit->kit->nome, ['controller' => 'Produtos', 'action' => 'edit', $produtosKit->kit->id], ['icon' => 'external-link-square']) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group" aria-label="">
                                            <?= $this->Html->link(__('Alterar'), ['action' => 'add', $produtosKit->kit_id]) ?>
                                            <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $produtosKit->kit_id], ['confirm' => __('Tem certeza de que deseja o registro {0}?', $produtosKit->kit_id)]) ?>
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
