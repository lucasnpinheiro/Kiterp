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
                echo $this->Form->input('codigo_banco');
                echo $this->Form->input('nome');
                echo $this->Form->input('agencia');
                echo $this->Form->input('conta_corrente');
                echo $this->Form->input('sequencial_arquivo');
                echo $this->Form->input('caminho_arquivo');
                echo $this->Form->input('sacador_avalista');
                echo $this->Form->input('cnpj_sacador');
                echo $this->Form->input('contrato');
                echo $this->Form->input('carteira');
                echo $this->Form->input('convenio');
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