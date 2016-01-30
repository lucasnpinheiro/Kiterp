<?php //debug($pedido)          ?>
<h2>Pedido: <?php echo $pedido->id; ?></h2>
<hr>
<?php
$total = 0;
foreach ($pedido->pedidos_itens as $key => $value) {
    ?>
    <div>
        <div style="width: 30%; display: inline-block;">
            <?php echo $value->produto->barra; ?>
        </div>
        <div style="width: 69%; text-align: right; display: inline-block;">
            <?php echo $value->produto->nome; ?>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div>
        <div style="width: 50%; display: inline-block;">
            <?php echo $this->Html->quantidade($value->qtde); ?> X <?php echo $this->Html->moeda($value->venda); ?>
        </div>
        <div style="width: 49%; display: inline-block; text-align: right;">
            <?php echo $this->Html->moeda($value->total); ?>
        </div>
    </div>
    <hr>
    <?php
    $total += (float) $value->total;
}
?>
<div>
    <div style="width: 30%; display: inline-block;">
        Total:
    </div>
    <div style="width: 69%; display: inline-block; text-align: right;">
        <?php echo $this->Html->moeda($total); ?>
    </div>
</div>
<script type="text/javascript">
    window.print();
    window.location.href = router.url + 'pedidos/redireciona/' + router.params.pass[0];
</script>