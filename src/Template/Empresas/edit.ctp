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
                <?= $this->Form->create($pessoa, ['id' => 'cadastro_pessoa']) ?>
                <?php
                echo $this->Form->input('id', ['value' => $pessoa->id, 'type' => 'hidden']);
                echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-xs-12']]);
                echo $this->Form->tipoPessoa('tipo_pessoa', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->status('status', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->simNao('consumidor_final', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('tipo_contribuinte', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('Empresa.id', ['value' => $empresa->id, 'type' => 'hidden']);
                echo $this->Form->input('Empresa.pessoa_id', ['value' => $empresa->pessoa_id, 'type' => 'hidden']);
                echo $this->Form->numero('Empresa.codigo_cidade', ['value' => $empresa->codigo_cidade, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->simNao('Empresa.regime_tributario', ['value' => $empresa->regime_tributario, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('Empresa.versao_sefaz', ['value' => $empresa->versao_sefaz, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->juros('Empresa.perentual_tributo', ['value' => $empresa->perentual_tributo, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->tzd('Empresa.hora_tzd', ['value' => $empresa->hora_tzd, 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                //echo $this->element('Pessoas/associacao');
                ?>
                <div class="clearfix"></div>
                <div class="hr-line-dashed"></div>
                <div class="clearfix"></div>
                <?php //echo $this->element('Usuarios/usuarios'); ?>
                <?php echo $this->element('Pessoas/fisica'); ?>
                <?php echo $this->element('Pessoas/juridica'); ?>


                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#PessoasContato" aria-controls="PessoasContato" role="tab" data-toggle="tab">Contatos</a></li>
                        <li role="presentation"><a href="#PessoasEndereco" aria-controls="PessoasEndereco" role="tab" data-toggle="tab">Endereços</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="PessoasContato"><?php echo $this->element('Pessoas/contatos'); ?></div>
                        <div role="tabpanel" class="tab-pane" id="PessoasEndereco"><?php echo $this->element('Pessoas/enderecos'); ?></div>
                    </div>

                </div>


                <div class="clearfix"></div>
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
echo $this->Html->script('/js/pessoas.js', ['block' => 'script']);
?>