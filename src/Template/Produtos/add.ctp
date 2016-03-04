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
                <?= $this->Form->create($produto, ['type' => 'file', 'autocomplete' => "on"]) ?>
                <?php
                echo $this->Form->input('barra', ['maxlength' => 14, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('codigo_interno', ['disabled' => true, 'maxlength' => 14, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->status('status', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->Form->input('unidade', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->Form->input('grupo_id', ['empty' => 'Selecione um Grupo', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->Form->simNao('produto_kit', ['value' => '0', 'label' => 'KIT', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->element('Produtos/valores');
                echo $this->Form->fileUpload('foto', ['type' => 'file', 'div' => ['class' => 'col-xs-12 col-md-12']]);
                echo $this->Form->input('descricao', ['label' => 'Descrição', 'div' => ['class' => 'col-xs-12 col-md-12']]);
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
<?php
echo $this->Html->script('/js/produtos.js', ['block' => 'script']);
?>