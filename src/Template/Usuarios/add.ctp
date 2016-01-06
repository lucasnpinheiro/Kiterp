<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Cadastrar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Cadastrar Usuário') ?></h5>
            </div>
            <div class="ibox-content">
                <?= $this->Form->create($usuario) ?>
                <?php
                echo $this->Form->input('pessoa_id', ['type' => 'hidden', 'value' => $pessoa_id]);
                echo $this->Form->input('nome');
                echo $this->Form->input('username');
                echo $this->Form->input('senha', ['value' => '']);
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