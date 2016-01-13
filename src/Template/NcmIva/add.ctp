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
                <?= $this->Form->create($ncmIva) ?>
                <?php
                echo $this->Form->input('icms_estadual_id', ['empty' => 'Selecione um estado', 'options' => $icmsEstaduais, 'value' => $estado]);
                $valoresIva = array();

                if (!empty($ncmIvaLista)) {
                    foreach ($ncmIvaLista as $key => $value) {
                        $valoresIva[$value->ncm_id] = $this->Html->moeda($value->iva, ['before' => null]);
                    }
                }
                ?>
                <table class="table table-bordered table-condensed table-hover table-striped">
                    <thead>
                        <tr>
                            <th>NCM</th>
                            <th>Valor do IVA</th>
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
                                    <?php echo $this->Form->moeda('ncm.' . $key . '.valor', ['value' => (isset($valoresIva[$key]) ? $valoresIva[$key] : ''), 'label' => false]); ?>
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


<?php
echo $this->Html->script('/js/ncm_iva.js', ['block' => 'script']);
?>