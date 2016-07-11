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
                <div class="row conteudo_add">
                    <div class="col-xs-12">
                        <?= $this->Form->create($banco) ?>
                        <?php
                        echo $this->Form->numero('codigo_banco', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->input('agencia', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->input('conta_corrente', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->input('sacador_avalista', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->cnpj('cnpj_sacador', ['label' => 'CNPJ Sacador', 'div' => ['class' => 'col-xs-12 col-md-4']]);
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
    </div>
</div>
