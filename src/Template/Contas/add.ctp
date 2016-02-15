<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Cadastrar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Cadastrar ' . $this->fetch('title')) . ' - ' . $tipo ?></h5>
            </div>
            <div class="ibox-content">
                <?= $this->Form->create($conta, ['url' => ['?' => ['tipo' => $this->request->query('tipo')]]]) ?>
                <?php
                $_contas = [];
                $_contas[0][-1]['id'] = -1;
                $_contas[0][-1]['tradutora'] = '';
                $_contas[0][-1]['nome'] = 'Conta';
                $_contas[0][-1]['id_pai'] = 0;
                $__contas = [];
                if (!empty($contas)) {
                    foreach ($contas as $key => $value) {
                        $_contas[$value->id_pai][$value->id]['id'] = $value->id;
                        $_contas[$value->id_pai][$value->id]['tradutora'] = $value->tradutora;
                        $_contas[$value->id_pai][$value->id]['nome'] = $value->nome;
                        $_contas[$value->id_pai][$value->id]['id_pai'] = $value->id_pai;
                    }
                }
                foreach ($_contas[0] as $k => $v) {
                    $__contas[$v['id']] = $v['tradutora'] . ' | ' . $v['nome'];
                    if (!empty($_contas[$v['id']])) {
                        foreach ($_contas[$v['id']] as $key => $value) {
                            $__contas[$value['id']] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --> ' . $value['tradutora'] . ' | ' . $value['nome'];
                        }
                    }
                }


                echo $this->Form->input('codigo');
                echo $this->Form->input('nome');
                echo $this->Form->input('tipo', ['type' => 'hidden', 'value' => $this->request->query('tipo')]);
                echo $this->Form->input('id_pai', ['label'=>'Sub-Conta','options' => $__contas, 'escape' => false]);
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
