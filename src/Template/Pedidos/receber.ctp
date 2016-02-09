<?= $this->Form->create($pedido, ['onSubmit' => 'return false;']) ?>
<?php
$parcelas = [];
$condicoes = [];
if (!empty($pedido->condicoes_pagamento->parcelas)) {
    $condicoes = unserialize($pedido->condicoes_pagamento->parcelas);
}
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
<div class="row">
    <div class="col-lg-12">
        <div class="col-sm-4">
            <h4>Empresa:</h4>
            <address>
                <strong style="font-size: 15px;"><?php echo $pedido->empresa->pessoa->nome; ?></strong>
            </address>
        </div>
        <div class="col-sm-4">
            <h4>Pedido:</h4>
            <address>
                <strong style="font-size: 15px;"><?php echo $pedido->id; ?></strong>
            </address>
        </div>
        <div class="col-sm-4">
            <h4>Data:</h4>
            <address>
                <strong style="font-size: 15px;"><?php echo $pedido->created->format('d/m/Y H:i:s'); ?></strong>
            </address>
        </div>
        <div class="col-sm-4">
            <h4>Cliente:</h4>
            <address>
                <strong style="font-size: 15px;"><?php echo $pedido->pessoa->nome; ?></strong>
            </address>
        </div>
        <div class="col-sm-4">
            <h4>Condições de Pagamento:</h4>
            <address>
                <strong style="font-size: 15px;"><?php echo $pedido->condicoes_pagamento->nome; ?></strong>
            </address>
        </div>
        <div class="col-sm-4">
            <h4>Status:</h4>
            <address>
                <strong style="font-size: 15px;"><?php echo $this->Html->statusPedido($pedido->status); ?></strong>
            </address>
        </div>


        <div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-12">Total Geral: </div>
                        <div class="col-xs-12 text-right">
                            <h2 class="calcula-total font-bold"><?php echo $this->Html->moeda($pedido->valor_total); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 yellow-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-12">Total Recebido: </div>
                        <div class="col-xs-12 text-right">
                            <h2 class="calcula-recebido font-bold">R$ 0,00</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 gray-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-12">Falta: </div>
                        <div class="col-xs-12 text-right">
                            <h2 class="calcula-diferenca font-bold"><?php echo $this->Html->moeda($pedido->valor_total); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 gray-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-12">Troco: </div>
                        <div class="col-xs-12 text-right">
                            <h2 class="calcula-troco font-bold">R$ 0,00</h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div>

            <div class="col-xs-12 col-md-7">
                <?php echo $this->Form->input('status', ['type' => 'hidden', 'value' => 3]) ?>
                <?php
                $_formasPagamentos = [];

                foreach ($formasPagamentos as $key => $value) {
                    $_formasPagamentos[$value->grupo][$value->id] = $value->nome;
                }

                echo $this->Form->moeda('opcoes.1.valor', ['class' => 'forma-selecionada', 'label' => 'Dinheiro', 'div' => ['class' => 'col-xs-12 col-md-12']]);
                echo $this->Form->moeda('opcoes.2.valor', ['class' => 'forma-selecionada', 'label' => 'Cheque', 'empty' => 'Selecione uma Opções', 'options' => $value, 'div' => ['class' => 'col-xs-12 col-md-8']]);
                echo $this->Form->numero('opcoes.2.parcelas', ['label' => 'Quantidade', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('opcoes.3.tipo', ['class' => 'forma-selecionada', 'label' => 'Cartão', 'empty' => 'Selecione uma Opções', 'options' => $_formasPagamentos[3], 'div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->moeda('opcoes.3.valor', ['class' => 'forma-selecionada', 'label' => 'Valor', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->numero('opcoes.3.parcelas', ['label' => 'Quantidade', 'div' => ['class' => 'col-xs-12 col-md-3']]);
                echo $this->Form->moeda('opcoes.4.valor', ['class' => 'forma-selecionada', 'label' => 'Prazo', 'empty' => 'Selecione uma Opções', 'options' => $value, 'div' => ['class' => 'col-xs-12 col-md-8']]);
                echo $this->Form->numero('opcoes.4.parcelas', ['label' => 'Quantidade', 'div' => ['class' => 'col-xs-12 col-md-4']]);

                echo $this->Form->button(__('Receber'), ['bootstrap-type' => 'primary', 'type' => 'submit', 'icon' => 'money', 'style' => 'display:none;', 'class' => 'col-lg-12 bt-pagar']);
                ?>
            </div>
            <div class="col-xs-12 col-md-5 text-right">
                <div class="clearfix"></div>
                <div style="font-size: 16px; font-weight: bold; text-align: left;">
                    <div class="col-xs-12 col-md-3 gray-bg">Documento</div>
                    <div class="col-xs-12 col-md-2 gray-bg">Parcela</div>
                    <div class="col-xs-12 col-md-3 gray-bg">Vencimento</div>
                    <div class="col-xs-12 col-md-4 gray-bg">Valor</div>
                </div>
                <?php
                foreach ($parcelas as $key => $value) {
                    echo $this->Form->input('parcelas.' . $key . '.documento', ['type' => 'hidden', 'label' => false, 'value' => $pedido->id]);
                    echo $this->Form->input('parcelas.' . $key . '.titulo', ['type' => 'hidden', 'label' => false, 'value' => $value['titulo']]);

                    echo $this->Form->input('parcelas.' . $key . '.documento', ['disabled' => true, 'label' => false, 'value' => $pedido->id, 'div' => ['class' => 'col-xs-12 col-md-3']]);
                    echo $this->Form->input('parcelas.' . $key . '.titulo', ['disabled' => true, 'label' => false, 'value' => $value['titulo'], 'div' => ['class' => 'col-xs-12 col-md-2']]);
                    echo $this->Form->data('parcelas.' . $key . '.data', ['label' => false, 'value' => date('d/m/Y', strtotime($value['data'])), 'div' => ['class' => 'col-xs-12 col-md-3'], 'append' => false]);
                    echo $this->Form->moeda('parcelas.' . $key . '.valor', ['class'=>'valor-parcelas-condicoes','label' => false, 'value' => $this->Html->moeda($value['valor']), 'div' => ['class' => 'col-xs-12 col-md-4'], 'append' => false]);
                }
                ?>

                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>


        </div>

        <hr>
        <h2>Detalhes do pedido</h2>

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
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<?= $this->Form->end() ?>
<div class="clearfix"></div>
<?php
echo $this->Html->script('/js/pedido_fechamento.js', ['block' => 'script']);
?>