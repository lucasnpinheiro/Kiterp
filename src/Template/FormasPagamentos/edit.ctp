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
                <?= $this->Form->create($formasPagamento) ?>
                <?php
                echo $this->Form->input('nome', ['autofocus' => true, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-12']]);
                echo $this->Form->input('abreviado', ['label' => 'Nome abreviado', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->numero('qtde_dias', ['label' => 'Quantidade(s) de dia(s)', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->numero('qtde_taxas', ['label' => 'Quantidade(s) de taxa(s)', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->element('FormasPagamentos/taxas');
                ?>
                <div class="clearfix"></div>
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



<?php
echo $this->Html->script('/js/formas_pagamentos.js', ['block' => 'script']);
?>