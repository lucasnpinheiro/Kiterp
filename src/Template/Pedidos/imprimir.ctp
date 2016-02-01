<div style="padding: 20px 40px;">
    <hr>
    <div>
        <div style="display: inline-block; width: 50%;"><?php echo $pedido->empresa->pessoa->nome; ?></div>
        <div style="display: inline-block; width: 49%; text-align: right;">Data: <?php echo $pedido->data_pedido->format('d/m/Y'); ?></div>
        <div style="display: inline-block; width: 50%;"><?php echo $pedido->empresa->pessoa->pessoas_enderecos[0]->endereco . ', ' . $pedido->empresa->pessoa->pessoas_enderecos[0]->numero; ?></div>
        <div style="display: inline-block; width: 49%; text-align: right;">Hora: <?php echo $pedido->data_pedido->format('H:i:s'); ?></div>
        <div style="display: inline-block; width: 50%;"><?php echo $pedido->empresa->pessoa->pessoas_enderecos[0]->cidade . ' - ' . $pedido->empresa->pessoa->pessoas_enderecos[0]->estado; ?></div>
        <div style="display: inline-block; width: 49%; text-align: right;"><?php echo $pedido->empresa->pessoa->pessoas_contatos[0]->tipos_contato->nome . ': ' . $this->Html->mask($pedido->empresa->pessoa->pessoas_contatos[0]->valor, '(##) ####-#####'); ?></div>
        <div style="display: inline-block; width: 50%;"><?php echo $this->Html->cpfCnpj($pedido->empresa->pessoa->tipo_pessoa == 1 ? $pedido->empresa->pessoa->pessoas_fisicas[0]->cpf : $pedido->empresa->pessoa->pessoas_juridicas[0]->cnpj) ?></div>
        <div style="display: inline-block; width: 49%; text-align: right;"><?php echo ($pedido->empresa->pessoa->tipo_pessoa == 1 ? $pedido->empresa->pessoa->pessoas_fisicas[0]->rg : $pedido->empresa->pessoa->pessoas_juridicas[0]->inscricao_estadual) ?></div>
        <div style="display: inline-block; width: 100%;">Controle Interno Número: <?php echo $pedido->id; ?></div>
    </div>
    <hr>
    <div>
        <div style="display: inline-block; width: 20%;">Cliente:</div>
        <div style="display: inline-block; width: 79%;"><?php echo $pedido->pessoa->nome; ?></div>
        <div style="display: inline-block; width: 20%;"><?php echo $pedido->pessoa->id; ?></div>
        <div style="display: inline-block; width: 79%;"><?php echo $pedido->pessoa->pessoas_enderecos[0]->endereco . ', ' . $pedido->pessoa->pessoas_enderecos[0]->numero; ?></div>
        <div style="display: inline-block; width: 20%;"></div>
        <div style="display: inline-block; width: 79%;"><?php echo $pedido->pessoa->pessoas_enderecos[0]->bairro; ?></div>
        <div style="display: inline-block; width: 20%;">Vendedor: </div>
        <div style="display: inline-block; width: 34%;"><?php echo $pedido->vendedore->nome; ?></div>
        <div style="display: inline-block; width: 15%;">Cond. Pgto: </div>
        <div style="display: inline-block; width: 29%;"><?php echo $pedido->condicoes_pagamento->nome; ?></div>
        <div style="display: inline-block; width: 20%;">Transportadora: </div>
        <div style="display: inline-block; width: 59%;"><?php echo $pedido->transportadora->nome; ?></div>
    </div>
    <hr>
    <div style="text-align: center; padding: 10px; margin: 10px; border: 2px #000 dotted;">
        ORDEM DE SEPARAÇÃO
    </div>
    <hr>
    <table style="width: 100%; border: none;">
        <thead>
            <tr>
                <th style="padding: 3px; text-align: right; width: 8%;">Qtde</th>
                <th style="padding: 3px; text-align: left; width: 42%;">Descrição</th>
                <th style="padding: 3px; text-align: left; width: 10%;">Unidade</th>
                <th style="padding: 3px; text-align: right; width: 20%;">Venda</th>
                <th style="padding: 3px; text-align: right; width: 20%;">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($pedido->pedidos_itens as $key => $value) {
                ?>

                <tr>
                    <td style="text-align: right;"><?php echo $this->Html->quantidade($value->qtde); ?></td>
                    <td><?php echo $value->produto->nome; ?></td>
                    <td><?php echo $value->produto->unidade; ?></td>
                    <td style="text-align: right;"><?php echo $this->Html->moeda($value->venda); ?></td>
                    <td style="text-align: right;"><?php echo $this->Html->moeda($value->total); ?></td>
                </tr>
                <?php
                $total += (float) $value->total;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right; margin-top: 10px; padding-top: 10px; border-top: 1px solid #000;">Total Geral:</td>
                <td style="text-align: right; margin-top: 10px; padding-top: 10px; border-top: 1px solid #000;"><?php echo $this->Html->moeda($total); ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<?php //debug($pedido); ?>
<script type="text/javascript">
    window.print();
    window.location.href = router.url + 'pedidos/redireciona/' + router.params.pass[0];
</script>