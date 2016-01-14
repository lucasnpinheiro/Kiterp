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
                <?= $this->Form->create($produto, ['type' => 'file']) ?>
                <?php
                echo $this->Form->numero('barra', ['maxlength' => 13, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->numero('codigo_interno', ['maxlength' => 13, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('unidade', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->Form->input('grupo_id', ['empty' => 'Selecione um Grupo', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->Form->simNao('produto_kit', ['value' => '0', 'label' => 'KIT', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->Form->fileUpload('foto', ['type' => 'file', 'div' => ['class' => 'col-xs-12 col-md-12']]);
                echo $this->Form->input('descricao', ['label' => 'Descrição', 'div' => ['class' => 'col-xs-12 col-md-12']]);
                ?>
                <div class="hr-line-dashed"></div>
                <div class="clearfix"></div>
                <?php echo $this->element('Produtos/valores'); ?>
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