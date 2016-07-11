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
                        <?= $this->Form->create($notasFiscaisEntrada) ?>
                        <?php
                        echo $this->Form->empresas('empresa_id', ['label' => 'Empresa', 'empty' => 'Selecione uma empresa', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->numero('numero_nota_fiscal', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->input('serie', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->pessoas('pessoa_id', ['label' => 'Fornecedor', 'empty' => 'Selecione um fornecedor', 'div' => ['class' => 'col-xs-12 col-md-3']], 3);
                        echo $this->Form->impostos('cfop_id', ['CFOP', 'div' => ['class' => 'col-xs-12 col-md-3']], 7);
                        echo $this->Form->data('data_emissao', ['label' => 'Data Emissão', 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->data('data_entrada', ['empty' => true, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->moeda('total_produtos', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->moeda('total_nota', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->impostos('base_icms', ['div' => ['class' => 'col-xs-12 col-md-3']], 6);
                        echo $this->Form->moeda('valor_icms', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->impostos('base_st', ['div' => ['class' => 'col-xs-12 col-md-3']], 1);
                        echo $this->Form->moeda('valor_st', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->moeda('valor_ipi', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->moeda('valor_frete', ['div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->moeda('valor_seguro', ['div' => ['class' => 'col-xs-12 col-md-3']]);
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
