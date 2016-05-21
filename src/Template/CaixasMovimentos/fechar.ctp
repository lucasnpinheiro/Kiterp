<div class="panel panel-primary">
    <div class="panel-heading font-header">
        <?php echo 'Movimento do Operador ' . $caixasDiarios->pessoa->nome . ' - Terminal: ' . $caixasDiarios->terminai->nome . ' - Data: ' . $caixasDiarios->data; ?>
    </div>
    <div class="col-xs-12">
        <h3>Totalizadores do Movimento</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($caixasMovimentos as $caixasMovimento): ?>
                        <tr>
                            <td><?= $this->Html->statusMovimentos($caixasMovimento->grupo_id) ?></td>
                            <td><?= $this->Html->moeda($caixasMovimento->valor) ?></td>
                            <td><?= h($caixasMovimento->descricao) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- /.table-responsive -->
        <div style="width: 50%; float: left;">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 70%;">Saldo Inicial</td>
                            <td style="width: 30%;" class="text-right" style="color:blue;"><?php echo $this->Html->moeda($totais[1]); ?></td>
                        </tr>
                        <tr>
                            <td>Entradas</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($totais[2]); ?></td>
                        </tr>
                        <tr>
                            <td>Retiradas</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($totais[3]); ?></td>
                        </tr>
                        <tr>
                            <td>Sangrias</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($totais[4]); ?></td>
                        </tr>
                        <tr>
                            <td>Vendas</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($pagamentos[0]['valor']); ?></td>
                        </tr>
                        <tr>
                            <td>Saldo Caixa</td>
                            <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda((floatval($totais[1]) + floatval($totais[2]) + floatval($pagamentos[0]['valor'])) - floatval($totais[3])); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="width: 50%; float: left;">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <?php
                        foreach ($pagamentos as $key => $value) {
                            if ($key > 0) {
                                ?>
                                <tr>
                                    <td><?php echo $value['nome'] ?></td>
                                    <td class="text-right" style="color:blue;"><?php echo $this->Html->moeda($value['valor']); ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="float: none;" class="clearfix"></div>

        <h3>Fechamento do Operador(a)</h3>
        <div style="width: 50%; float: left;">
            <div class="table-responsive">
                <table class="table">
                    <tbody>  
                        <tr>
                            <td style="width: 20%;">Dinheiro :</td>
                            <td style="width: 80%;"><div style="width: 100%;" class="borda_rodape">&nbsp;</div></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Cartão :</td>
                            <td style="width: 80%;"><div style="width: 100%;" class="borda_rodape">&nbsp;</div></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Cheque :</td>
                            <td style="width: 80%;"><div style="width: 100%;" class="borda_rodape">&nbsp;</div></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Prazo :</td>
                            <td style="width: 80%;"><div style="width: 100%;" class="borda_rodape">&nbsp;</div></td>
                        </tr>

                        <tr>
                            <td style="width: 20%;">Moedas :</td>
                            <td style="width: 80%;"><div style="width: 100%;" class="borda_rodape">&nbsp;</div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="width: 50%; float: left;">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 20%;">Sangria :</td>
                            <td style="width: 80%;"><div style="width: 100%;" class="borda_rodape">&nbsp;</div></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Troco :</td>
                            <td style="width: 80%;"><div style="width: 100%;" class="borda_rodape">&nbsp;</div></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Total :</td>
                            <td style="width: 80%;"><div style="width: 100%;" class="borda_rodape">&nbsp;</div></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Saldo CX :</td>
                            <td style="width: 80%;"><div style="width: 100%;" class="borda_rodape">&nbsp;</div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="float: none;" class="clearfix"></div>
        <div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width:12%;">Diferença :</td>
                            <td style="width:70%;"><div style="width: 100%;" class="borda_rodape">&nbsp;</div></td>
                            <td style="width:18%; text-align: right;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) - Sobra (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) - Falta</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-12 col-md-3"></div>
        <div class="col-xs-12 col-md-6">
            <br />
            <div><div style="border-bottom: 1px solid #000;" class="col-xs-12">&nbsp;</div></div>
            <div class="clearfix"></div>
            <div class="text-center"> Ass. Operador(a) </div>
            <div class="text-center"> Operador(a) <?php echo $caixasDiarios->pessoa->nome; ?> </div>
        </div>
        <div class="col-xs-12 col-md-3"></div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-footer">
        <div class="col-xs-12 font-12 text-center-xs text-right">
            <?php echo $this->Html->link('<i class="fa fa-print"></i> Imprimir', array_merge(array_merge($this->request->query, $this->request->params['pass']), ['imprimir' => 'S']), ['class' => 'btn btn-primary']); ?>
        </div><!-- /.row -->
        <div class="clearfix"></div>
    </div>
</div>
