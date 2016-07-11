<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Alterar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Alterar ' . $this->fetch('title')) . ' - ' . $tipo ?></h5>
            </div>
            <div class="ibox-content">
                <div class="row conteudo_add">
            <div class="col-xs-12">
                <?= $this->Form->create($conta, ['url' => ['?' => ['tipo' => $this->request->query('tipo')]]]) ?>
                <?php
                echo $this->Form->input('codigo', ['type' => 'hidden']);
                echo $this->Form->input('nome');
                echo $this->Form->input('tipo', ['type' => 'hidden', 'value' => $this->request->query('tipo')]);
                echo $this->Form->input('id_pai', ['type' => 'hidden']);
                ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <?= $this->Form->button(__('Salvar', ['class' => 'btn btn-primary'])) ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?= $this->Form->end() ?>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>