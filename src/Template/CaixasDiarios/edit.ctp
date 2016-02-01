<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Alterar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Alterar ' . $this->fetch('title') . ' do Operador: "' . $caixasDiario->operadore->nome . '"'); ?></h5>
            </div>
            <div class="ibox-content">
                <div class="col-xs-12 col-md-5"><h1 class="text-center">Caixa número (<?php echo $caixasDiario->numero_caixa; ?>)</h1></div>
                <div class="col-xs-12 col-md-2 text-center"><?php echo ($caixasDiario->encerrado == 1 ? $this->Html->label('Encerrado', 'danger') : $this->Html->label('Abereto', 'primary')); ?></div>
                <div class="col-xs-12 col-md-5"><h3 class="text-center">Data de fechamento (<?php echo ($caixasDiario->data_encerramento != '' ? $caixasDiario->data_encerramento->format('d/m/Y') : date('d/m/Y')); ?>)</h3></div>
                <div class="clearfix"></div>
                <?= $this->Form->create($caixasDiario) ?>
                <?php
                //echo $this->Form->input('numero_caixa');
                //echo $this->Form->input('operador');
                //echo $this->Form->input('data_abertura');
                //echo $this->Form->moeda('valor_inicial');
                echo $this->Form->moeda('total_entradas', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->moeda('total_saidas', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->moeda('total_saldo', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('encerrado', ['value' => 1, 'type' => 'hidden']);
                echo $this->Form->moeda('total_real', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->moeda('total_sobras', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->moeda('total_faltas', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                ?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <?php
                        if ($caixasDiario->encerrado != 1) {
                            echo $this->Form->button(__('Salvar', ['class' => 'btn btn-primary']));
                        }
                        ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>