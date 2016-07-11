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
                    echo $this->Form->input('ncm_id', ['options' => $ncm, 'empty' => 'Selecione um NCM', 'label' => false, 'placeholder' => 'NCM']);
                    echo $this->Form->input('icms_estadual_id', ['options' => $icmsEstaduais, 'empty' => 'Selecione um Estado', 'label' => false, 'placeholder' => 'ICMS Estatual']);
                    echo $this->Form->button('Consultar', ['style' => 'margin-top: 5px;', 'type' => 'submit', 'icon' => 'search']);
                    echo $this->Form->end();
                    ?>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('ncm_id', 'Nome') ?></th>
                                <th><?= $this->Paginator->sort('ncm_id', 'NCM') ?></th>
                                <th><?= $this->Paginator->sort('icms_estadual_id', 'Estado') ?></th>
                                <th><?= $this->Paginator->sort('iva', 'IVA') ?></th>
                                <th><?= $this->Paginator->sort('perc_tributo', 'Tributo') ?></th>
                                <th class="actions"><?= __('Ação') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ncmIva as $ncmIva):
                                ?>
                                <tr>
                                    <td><?= h($ncmIva->ncm->nome) ?></td>
                                    <td><?= h($ncmIva->ncm->ncm) ?></td>
                                    <td><?= h($ncmIva->icms_estaduai->nome) ?></td>
                                    <td><?= $this->Html->juros($ncmIva->iva) ?></td>
                                    <td><?= $this->Html->juros($ncmIva->perc_tributo) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->linkPermissao('', ['action' => 'add', $ncmIva->icms_estadual_id], ['class' => 'btn-warning btn btn-xs', 'icon' => 'pencil']) ?>
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