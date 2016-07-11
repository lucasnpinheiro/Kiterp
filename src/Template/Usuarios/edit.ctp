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
                <div class="row conteudo_add">
                    <div class="col-xs-12">
                        <?= $this->Form->create($usuario) ?>
                        <?php
                        echo $this->Form->input('pessoa_id', ['type' => 'hidden']);
                        echo $this->Form->input('nome', [ 'div' => ['class' => 'col-xs-12 col-md-12']]);
                        echo $this->Form->input('username', [ 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('senha', ['type' => 'password', 'value' => '', 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->select2('grupo_id', ['multiple' => true, 'value' => $usuarios_grupo, 'options' => $grupo, 'div' => ['class' => 'col-xs-12 col-md-12']], ['tags' => true]);
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