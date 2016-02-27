<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Cadastrar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Cadastrar ' . $this->fetch('title')) ?></h5>
            </div>
            <div class="ibox-content">
                <?= $this->Form->create($caixasDiario) ?>
                <?php
                echo $this->Form->data('data', ['required' => true, 'value' => date('d/m/Y'), 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('pessoa_id', ['required' => true, 'options' => $vendedor, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('terminal_id', ['required' => true, 'options' => $terminais, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->status('status', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
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