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
                <?= $this->Form->create($caixasDiario) ?>
                <?php
                echo $this->Form->input('numero_caixa');
                echo $this->Form->input('operador');
                echo $this->Form->input('data_abertura');
                echo $this->Form->input('data_encerramento');
                echo $this->Form->input('valor_inicial');
                echo $this->Form->input('total_entradas');
                echo $this->Form->input('total_saidas');
                echo $this->Form->input('total_saldo');
                echo $this->Form->input('encerrado');
                echo $this->Form->input('total_real');
                echo $this->Form->input('total_sobras');
                echo $this->Form->input('total_faltas');
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