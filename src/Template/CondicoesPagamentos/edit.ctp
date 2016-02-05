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
                <?= $this->Form->create($condicoesPagamento) ?>
                <?php
                echo $this->Form->input('nome', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->numero('qtde_dias', ['required' => true, 'label' => 'Dias corridos', 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('qtde_parcelas', ['options' => $this->Form->gerarOptions(1, (int) Cake\Core\Configure::read('Parametros.CMaxParcelas')), 'required' => true, 'label' => 'Parcelas', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->simNao('avista', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->simNao('principal', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->element('CondicoesPagamentos/parcelas');

                if (!empty($condicoesPagamento->formas_pagamentos)) {
                    $condicoesPagamento->formas_pagamentos = unserialize($condicoesPagamento->formas_pagamentos);
                }
                $i = 0;
                foreach ($formasPagamentos->toArray() as $key => $value) {
                    echo '<div class="col-xs-12 col-md-2">';
                    echo $this->Form->input('formas_pagamentos.' . $i, ['type' => 'checkbox', 'label' => $value, 'value' => $key, 'hiddenField' => false]);
                    echo '</div>';
                    $i++;
                }
                ?>
                <div class="clearfix"></div>
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
echo $this->Html->script('/js/condicoes_pagamentos.js', ['block' => 'script']);
?>