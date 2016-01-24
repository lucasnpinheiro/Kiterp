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