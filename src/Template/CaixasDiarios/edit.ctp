<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Alterar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Alterar ' . $this->fetch('title')); ?></h5>
            </div>
            <div class="ibox-content">
                <div class="row conteudo_add">
                    <div class="col-xs-12">
                        <?= $this->Form->create($caixasDiario) ?>
                        <?php
                        echo $this->Form->data('data', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => date('d/m/Y')]);
                        echo $this->Form->input('terminal_id', ['options' => $terminais, 'empty' => true, 'value' => 1, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->pessoas('pessoa_id', ['empty' => true, 'label' => 'Operadores', 'div' => ['class' => 'col-xs-12 col-md-4']], 6);
                        echo $this->Form->input('status', ['type' => 'hidden', 'value' => 1]);
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