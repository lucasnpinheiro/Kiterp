<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Alterar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Alterar ' . $this->fetch('title')) ?></h5>
            </div>
            <div class="ibox-content">
                <div class="row conteudo_add">
            <div class="col-xs-12">
                <?= $this->Form->create($imposto) ?>
                <?php
                echo $this->Form->tipoImpostos('tipo_imposto', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('codigo', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-5']]);
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