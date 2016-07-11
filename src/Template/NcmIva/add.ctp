<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Cadastrar/Alterar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Cadastrar/Alterar ' . $this->fetch('title')) ?></h5>
            </div>
            <div class="ibox-content">
                <div class="row conteudo_add">
            <div class="col-xs-12">
                <?= $this->Form->create($ncmIva) ?>
                <?php
                echo $this->Form->input('icms_estadual_id', ['empty' => 'Selecione um estado', 'options' => $icmsEstaduais, 'value' => $estado]);
                $valoresIva = [];

                if (!empty($ncmIvaLista)) {
                    foreach ($ncmIvaLista as $key => $value) {
                        $valoresIva[$value->ncm_id]['valor'] = $this->Html->juros($value->iva, ['after' => null]);
                        $valoresIva[$value->ncm_id]['tributo'] = $this->Html->juros($value->perc_tributo, ['after' => null]);
                    }
                }
                ?>
                <table class="table table-bordered table-condensed table-hover table-striped">
                    <thead>
                        <tr>
                            <th>NCM</th>
                            <th>Valor do IVA</th>
                            <th>Valor do Tributo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($ncm as $key => $value) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $this->Form->input('ncm.' . $key . '.id', ['value' => $key, 'type' => 'hidden']); ?>
                                    <?php echo $value; ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->juros('ncm.' . $key . '.valor', ['value' => (isset($valoresIva[$key]['valor']) ? $valoresIva[$key]['valor'] : ''), 'label' => false]); ?>
                                </td>
                                <td>
                                    <?php echo $this->Form->juros('ncm.' . $key . '.tributo', ['value' => (isset($valoresIva[$key]['tributo']) ? $valoresIva[$key]['tributo'] : ''), 'label' => false]); ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
                <?php
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


<?php
echo $this->Html->script('/js/ncm_iva.js', ['block' => 'script']);
?>