<?php
$lista_produtos_valores = [];
if (isset($produto->produtos_valores) and count($produto->produtos_valores) > 0)
{
    foreach ($produto->produtos_valores as $key => $value)
    {
        $lista_produtos_valores[$value->empresa_id] = $value;
    }
}

function prde($lista_produtos_valores, $empresa, $campo)
{
    if (isset($lista_produtos_valores[$empresa][$campo]))
    {
        return$lista_produtos_valores[$empresa][$campo];
    }
    return null;
}
?>

<div class="col-lg-12">
    <div class="ibox-title">
        <h5>Impostos e valores</h5>
    </div>
    <div class="ibox-content">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <?php
            if (count($empresas) > 0)
            {
                foreach ($empresas as $key => $value)
                {
                    echo '<li role="presentation" class="' . ($key > 0 ? '' : 'active') . '"><a href="#empresa_' . $value->id . '" aria-controls="empresa_' . $value->id . '" role="tab" data-toggle="tab">' . $value->pessoa->nome . '</a></li>';
                }
            }
            ?>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content" style="margin-top: 15px; ">
            <?php
            if (count($empresas) > 0)
            {
                foreach ($empresas as $key => $value)
                {
                    ?>
                    <div role="tabpanel" class="tab-pane <?php echo ($key > 0 ? '' : 'active'); ?>" id="empresa_<?php echo $value->id; ?>">
                        <?php
                        echo $this->Form->input('ProdutosValor.' . $value->id . '.id', ['value' => prde($lista_produtos_valores, $value->id, 'id'), 'type' => 'hidden']);
                        echo $this->Form->input('ProdutosValor.' . $value->id . '.empresa_id', ['value' => $value->id, 'type' => 'hidden']);
                        echo $this->Form->input('ProdutosValor.' . $value->id . '.produto_id', ['value' => prde($lista_produtos_valores, $value->id, 'produto_id'), 'type' => 'hidden']);

                        echo $this->Form->quantidade('ProdutosValor.' . $value->id . '.estoque_minimo', ['readonly' => (isset($produto->id) and $produto->id != '' ? true : false), 'value' => $this->Html->quantidade(prde($lista_produtos_valores, $value->id, 'estoque_minimo')), 'class' => 'input-lg estoque-minimo', 'style' => 'color: blue; font-size: 22px;', 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->quantidade('ProdutosValor.' . $value->id . '.estoque_atual', ['readonly' => (isset($produto->id) and $produto->id != '' ? true : false), 'value' => $this->Html->quantidade(prde($lista_produtos_valores, $value->id, 'estoque_atual')), 'class' => 'input-lg estoque-atual', 'style' => 'color: blue; font-size: 22px;', 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->moeda('ProdutosValor.' . $value->id . '.valor_compras', ['value' => $this->Html->moeda(prde($lista_produtos_valores, $value->id, 'valor_compras'), ['before' => null]), 'class' => 'input-lg valor-compra', 'style' => 'color: blue; font-size: 22px;', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->juros('ProdutosValor.' . $value->id . '.margem', ['value' => $this->Html->juros(prde($lista_produtos_valores, $value->id, 'margem'), ['after' => null]), 'readonly' => true, 'class' => 'input-lg margem', 'style' => 'color: blue; font-size: 22px;', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->moeda('ProdutosValor.' . $value->id . '.valor_vendas', ['value' => $this->Html->moeda(prde($lista_produtos_valores, $value->id, 'valor_vendas'), ['before' => null]), 'class' => 'input-lg calcular-procentagem', 'style' => 'color: blue; font-size: 22px;', 'required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);

                        echo $this->Form->input('ProdutosValor.' . $value->id . '.ncm_id', ['value' => prde($lista_produtos_valores, $value->id, 'ncm_id'), 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->input('ProdutosValor.' . $value->id . '.cst_pis', ['value' => prde($lista_produtos_valores, $value->id, 'cst_pis'), 'div' => ['class' => 'col-xs-12 col-md-2']]);
                        echo $this->Form->input('ProdutosValor.' . $value->id . '.cst_cofins', ['value' => prde($lista_produtos_valores, $value->id, 'cst_cofins'), 'div' => ['class' => 'col-xs-12 col-md-2']]);
                        echo $this->Form->input('ProdutosValor.' . $value->id . '.cst_icms', ['value' => prde($lista_produtos_valores, $value->id, 'cst_icms'), 'div' => ['class' => 'col-xs-12 col-md-2']]);
                        echo $this->Form->input('ProdutosValor.' . $value->id . '.cst_origem', ['value' => prde($lista_produtos_valores, $value->id, 'cst_origem'), 'div' => ['class' => 'col-xs-12 col-md-3']]);

                        echo $this->Form->juros('ProdutosValor.' . $value->id . '.percentual_icms', ['value' => prde($lista_produtos_valores, $value->id, 'percentual_icms'), 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        echo $this->Form->juros('ProdutosValor.' . $value->id . '.percentual_pis', ['value' => prde($lista_produtos_valores, $value->id, 'percentual_pis'), 'div' => ['class' => 'col-xs-12 col-md-2']]);
                        echo $this->Form->juros('ProdutosValor.' . $value->id . '.percentual_cofins', ['value' => prde($lista_produtos_valores, $value->id, 'percentual_cofins'), 'div' => ['class' => 'col-xs-12 col-md-2']]);
                        echo $this->Form->juros('ProdutosValor.' . $value->id . '.percentual_ipi', ['value' => prde($lista_produtos_valores, $value->id, 'percentual_ipi'), 'div' => ['class' => 'col-xs-12 col-md-2']]);
                        echo $this->Form->juros('ProdutosValor.' . $value->id . '.percentual_tributacao', ['value' => prde($lista_produtos_valores, $value->id, 'percentual_tributacao'), 'div' => ['class' => 'col-xs-12 col-md-3']]);
                        ?>
                    </div>
                    <?php
                }
            }
            ?>

        </div>

    </div>
</div>