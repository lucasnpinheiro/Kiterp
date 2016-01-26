<?php
//debug($pedido->condicoes_pagamento->parcelas);
$parcelas = [];
$condicoes = $pedido->condicoes_pagamento->parcelas;
if (count($condicoes) < 1) {
    $condicoes[0] = 0;
}
$total = number_format($pedido->valor_total / count($condicoes), 2);
$diferenca = 0;
foreach ($condicoes as $key => $value) {
    if ($value > 1) {
        $parcelas[$key]['data'] = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + $value));
        $parcelas[$key]['valor'] = (float) $total;
        $parcelas[$key]['titulo'] = str_pad($key + 1, 2, "0", STR_PAD_LEFT);
    } else {
        $parcelas[$key]['data'] = date('Y-m-d');
        $parcelas[$key]['valor'] = (float) $total;
        $parcelas[$key]['titulo'] = str_pad($key + 1, 2, "0", STR_PAD_LEFT);
    }
    $diferenca += $total;
}
$parcelas[0]['valor'] += ($pedido->valor_total - $diferenca);
?>
<div class="ibox-content p-xl">
    <div class="row">
        <div class="col-sm-6">
            <h5>Empresa:</h5>
            <address>
                <strong><?php echo $pedido->empresa->pessoa->nome; ?></strong>
            </address>
        </div>

        <div class="col-sm-6 text-right">
            <h4>Pedido:</h4>
            <h4 class="text-navy"><?php echo $pedido->id; ?></h4>
            <span>Para:</span>
            <address>
                <strong><?php echo $pedido->pessoa->nome; ?></strong>
            </address>
            <p>
                <span><strong>Data:</strong> <?php echo $pedido->created->format('d/m/Y H:i:s'); ?></span><br/>
            </p>
        </div>
    </div>

    <div>
        <?= $this->Form->create($pedido, ['onSubmit' => 'return false;']) ?>
        <div class="col-xs-12 col-md-6">
            <?php echo $this->Form->input('status', ['type' => 'hidden', 'value' => 3]) ?>
            <?php echo $this->Form->input('opcoes', ['label' => 'Opções de Pagamentos', 'empty' => 'Selecione uma Opções', 'required' => true, 'options' => $formasPagamentos]) ?>

            <div style="font-size: 16px; font-weight: bold;">
                <div class="col-xs-12 col-md-2 gray-bg">Documento</div>
                <div class="col-xs-12 col-md-2 gray-bg">Parcela</div>
                <div class="col-xs-12 col-md-4 gray-bg">Vencimento</div>
                <div class="col-xs-12 col-md-4 gray-bg">Valor</div>
            </div>
            <?php
            foreach ($parcelas as $key => $value) {
                echo $this->Form->input('parcelas.' . $key . 'documento', ['label' => false, 'value' => $pedido->id, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->Form->input('parcelas.' . $key . 'titulo', ['label' => false, 'value' => $value['titulo'], 'div' => ['class' => 'col-xs-12 col-md-2']]);
                echo $this->Form->data('parcelas.' . $key . 'data', ['label' => false, 'value' => date('d/m/Y', strtotime($value['data'])), 'div' => ['class' => 'col-xs-12 col-md-4'], 'append' => false]);
                echo $this->Form->moeda('parcelas.' . $key . 'valor', ['label' => false, 'value' => $value['valor'], 'div' => ['class' => 'col-xs-12 col-md-4'], 'append' => false]);
            }
            ?>

            <div class="opcoes-pagamento"></div>

        </div>
        <div class="col-xs-12 col-md-6 text-right">
            <div class="col-lg-6">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-12">Total Geral: </div>
                        <div class="col-xs-12 text-right">
                            <h2 class="calcula-total font-bold"><?php echo $this->Html->moeda($pedido->valor_total); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget style1 yellow-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-12">Total Recebido: </div>
                        <div class="col-xs-12 text-right">
                            <h2 class="calcula-recebido font-bold">R$ 0,00</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget style1 red-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-12">Diferença: </div>
                        <div class="col-xs-12 text-right">
                            <h2 class="calcula-recebido font-bold">R$ 0,00</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget style1 gray-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-12">Troco: </div>
                        <div class="col-xs-12 text-right">
                            <h2 class="calcula-troco font-bold">R$ 0,00</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <?= $this->Form->button(__('Pagar'), ['bootstrap-type' => 'primary', 'type' => 'submit', 'icon' => 'money', 'style' => 'display:none;', 'class' => 'bt-pagar']) ?>
        <?= $this->Form->end() ?>
    </div>


    <div class="table-responsive m-t">
        <table class="table invoice-table">
            <thead>
                <tr>
                    <th colspan="2">Produtos</th>
                    <th>Quantidade</th>
                    <th>Valor Unitario</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedido->pedidos_itens as $key => $value) {
                    ?>
                    <tr>
                        <td class="text-right"><?php echo $value->produto->barra; ?></td>
                        <td style="text-align: left;"><?php echo $value->produto->nome; ?></td>
                        <td><?php echo $value->qtde; ?></td>
                        <td class="text-right"><?php echo $this->Html->moeda($value->venda); ?></td>
                        <td class="text-right"><?php echo $this->Html->moeda($value->total); ?></td>
                    </tr>
                <?php }
                ?>

            </tbody>
        </table>
    </div><!-- /table-responsive -->

    <table class="table invoice-total">
        <tbody>
            <tr>
                <td><strong>TOTAL :</strong></td>
                <td class="valor-total" rel="<?php echo $pedido->valor_total; ?>"><?php echo $this->Html->moeda($pedido->valor_total); ?></td>
            </tr>
        </tbody>
    </table>

</div>
<?php
echo $this->Html->script('/js/pedido_fechamento.js', ['block' => 'script']);
?>