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
                        <?= $this->Form->create($pessoa, ['id' => 'cadastro_pessoa']) ?>
                        <?php
                        echo $this->Form->input('id', ['type' => 'hidden', 'id' => 'PessoaId']);
                        echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-xs-12']]);
                        echo $this->Form->tipoPessoa('tipo_pessoa', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->status('status', ['div' => ['required' => true, 'class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->simNao('consumidor_final', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->tipoContribuinte('tipo_contribuinte', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->input('observacoes', ['label' => 'Observações', 'type' => 'textarea', 'div' => ['class' => 'col-xs-12 col-md-12']]);
                        echo $this->Form->input('PessoasAssociacao.tipo_associacao', ['type' => 'hidden', 'value' => 6]);
                        ?>
                        <div class="clearfix"></div>
                        <div class="hr-line-dashed"></div>
                        <div class="clearfix"></div>
                        <?php echo $this->element('Usuarios/usuarios'); ?>
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
    </div>
</div>

<?php
echo $this->Html->script('/js/pessoas.js', ['block' => 'script']);
?>