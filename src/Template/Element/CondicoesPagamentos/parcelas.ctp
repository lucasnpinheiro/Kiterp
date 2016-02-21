<div class="clearfix"></div>
<div class="multi-field-wrapper">
    <div class="multi-fields">
        <?php
        if (!empty($condicoesPagamento->parcelas)) {
            $condicoesPagamento->parcelas = unserialize($condicoesPagamento->parcelas);
            foreach ($condicoesPagamento->parcelas as $key => $value) {
                ?>

                <div class="multi-field col-xs-2">
                    <?php
                    echo $this->Form->numero('parcelas.' . $key, ['label' => false, 'value' => $value, 'div' => ['class' => 'col-xs-12']]);
                    ?>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="multi-field col-xs-2">
                <?php
                echo $this->Form->numero('parcelas.0', ['label' => false, 'value' => '', 'div' => ['class' => 'col-xs-12']]);
                ?>
            </div>

            <?php
        }
        ?>

    </div>
</div>
<div class="clearfix"></div>