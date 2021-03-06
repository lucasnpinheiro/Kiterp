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
                        <?= $this->Form->create($icmsEstaduai) ?>
                        <?php
                        echo $this->Form->input('estado', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                        echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->juros('icms_interno', ['data-precision' => 2, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                        echo $this->Form->juros('icms_externo', ['data-precision' => 2, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
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