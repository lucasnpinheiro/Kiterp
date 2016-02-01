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
                <?= $this->Form->create($notaFiscalEntrada) ?>
                <?php
                echo $this->Form->input('empresa_id', ['options' => $empresas, 'empty' => true]);
                echo $this->Form->input('numero_nota_fiscal');
                echo $this->Form->input('serie');
                echo $this->Form->input('pessoa_id', ['options' => $pessoas, 'empty' => true]);
                echo $this->Form->input('cfop_id');
                echo $this->Form->input('data_emissao', ['empty' => true]);
                echo $this->Form->input('data_entrada', ['empty' => true]);
                echo $this->Form->input('total_produtos');
                echo $this->Form->input('total_nota');
                echo $this->Form->input('base_icms');
                echo $this->Form->input('valor_icms');
                echo $this->Form->input('base_st');
                echo $this->Form->input('valor_st');
                echo $this->Form->input('valor_ipi');
                echo $this->Form->input('valor_frete');
                echo $this->Form->input('valor_seguro');
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