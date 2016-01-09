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
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('empresa_id') ?></th>
                                <th><?= $this->Paginator->sort('produto_id') ?></th>
                                <th><?= $this->Paginator->sort('kit_id') ?></th>
                                <th><?= $this->Paginator->sort('qtde') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>
                                <th><?= $this->Paginator->sort('modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtosKits as $produtosKit): ?>
                                <tr>
                                    <td><?= $this->Number->format($produtosKit->id) ?></td>
                                    <td><?= $produtosKit->has('empresa') ? $this->Html->link($produtosKit->empresa->id, ['controller' => 'Empresas', 'action' => 'edit', $produtosKit->empresa->id]) : '' ?></td>
                                    <td><?= $produtosKit->has('produto') ? $this->Html->link($produtosKit->produto->id, ['controller' => 'Produtos', 'action' => 'edit', $produtosKit->produto->id]) : '' ?></td>
                                    <td><?= $this->Number->format($produtosKit->kit_id) ?></td>
                                    <td><?= $this->Number->format($produtosKit->qtde) ?></td>
                                    <td><?= h($produtosKit->created) ?></td>
                                    <td><?= h($produtosKit->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produtosKit->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produtosKit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtosKit->id)]) ?>
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
