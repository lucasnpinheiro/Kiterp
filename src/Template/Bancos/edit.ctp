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
                <?= $this->Form->create($banco) ?>
                <?php
                echo $this->Form->numero('codigo_banco', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('nome', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('agencia', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('conta_corrente', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->numero('sequencial_arquivo', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('caminho_arquivo', ['readonly' => true, 'value' => ROOT . DS . 'webroot' . DS . 'Banco' . DS . '{id}' . DS, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('sacador_avalista', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->cnpj('cnpj_sacador', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('contrato', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('carteira', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('convenio', ['div' => ['class' => 'col-xs-12 col-md-4']]);
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