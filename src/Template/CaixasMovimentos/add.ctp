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
                <?= $this->Form->create($caixasMovimento) ?>
                <?php
                echo $this->Form->caixas('caixas_diario_id', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']], ['conditions' => ['CaixasDiarios.status' => 1]]);
                echo $this->Form->statusMovimentos('status', ['label' => 'Tipo', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->moeda('valor', ['div' => ['required' => true, 'class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->tiposPagamentos('grupo_id', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->input('descricao', ['required' => true, 'label' => 'Descrição', 'div' => ['class' => 'col-xs-12 col-md-12']]);
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