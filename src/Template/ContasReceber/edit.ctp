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
                <?= $this->Form->create($contasReceber) ?>
                <?php
                echo $this->Form->input('empresa_id', ['options' => $empresas, 'empty' => true]);
                echo $this->Form->input('numero_documento');
                echo $this->Form->input('data_vencimento', ['empty' => true]);
                echo $this->Form->input('valor_documento');
                echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
                echo $this->Form->input('banco_id', ['options' => $bancos, 'empty' => true]);
                echo $this->Form->input('tradutora_id');
                echo $this->Form->input('status');
                echo $this->Form->input('data_recebimento', ['empty' => true]);
                echo $this->Form->input('valor recebimento');
                echo $this->Form->input('numero_pedido');
                echo $this->Form->input('nota_fiscal');
                echo $this->Form->input('serie');
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