<div class="clearfix"></div>
<div class="multi-field-wrapper" style="<?php echo ($formasPagamento->qtde_taxas > 0 ? '' : 'display: none;') ?>">
    <div class="multi-fields">
        <?php
        if (trim($formasPagamento->valor_taxas) != '') {
            $taxas = json_decode($formasPagamento->valor_taxas, true);
            foreach ($taxas as $key => $value) {
                ?>

                <div class="multi-field col-xs-3">
                    <?php
                    echo $this->Form->juros('valor.' . $key . '.taxa', ['value' => $this->Html->juros($value), 'type' => 'text', 'div' => ['class' => 'col-xs-12']]);
                    ?>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="multi-field col-xs-3">
                <?php
                echo $this->Form->juros('valor.0.taxa', ['type' => 'text', 'div' => ['class' => 'col-xs-12']]);
                ?>
            </div>

            <?php
        }
        ?>

    </div>
</div>