<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Cadastrar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Cadastrar ' . $this->fetch('title')) ?></h5>
            </div>
            <div class="ibox-content">
                <div class="row conteudo_add">
                    <div class="col-xs-12">
                        <?= $this->Form->create($produtosKit) ?>
                        <?php
                        //echo $this->Form->input('empresa_id', ['options' => $empresas, 'empty' => true]);
                        //echo $this->Form->input('produto_id', ['options' => $produtos, 'empty' => true]);
                        //
                //echo $this->Form->input('qtde');
                        if (count($kits) > 0) {
                            $_kits = [];
                            foreach ($kits as $key => $value) {
                                $_kits[$value->id] = $value->nome;
                            }
                            echo $this->Form->input('kit_id', ['required' => true, 'value' => $kit, 'label' => 'Produtos marcados como KIT', 'options' => $_kits, 'empty' => 'Selecione um Kit']);
                        } else {
                            echo 'Não tem nenhum produto marcado como Kit.';
                        }

                        if (count($empresas) > 0) {
                            ?>
                            <table class="table table-bordered table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Custo</th>
                                        <th>venda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($listaKits) > 0) {
                                        foreach ($empresas as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo h($value['nome']); ?></td>
                                                <td><?php echo $this->Html->moeda($value['custo']); ?></td>
                                                <td><?php echo $this->Html->moeda($value['venda']); ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php } ?>
                        <div style="overflow: auto;">
                            <table class="table table-bordered table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Nome</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody class="lista-itens-produtosKits">
                                    <?php
                                    if (count($listaKits) > 0) {
                                        foreach ($listaKits as $key => $value) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $this->Form->input('Produto.' . $key . '.produto_id', ['value' => $value->produto_id, 'type' => 'hidden', 'label' => false, 'class' => 'desc-produto-id']); ?>
                                                    <?php echo $this->Form->input('Produto.' . $key . '.codigo', ['value' => $value->produto->barra, 'label' => false, 'class' => 'input-sm busca-produto desc-codigo', 'append' => false, 'maxlength' => 32, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?>
                                                </td>
                                                <td><?php echo $this->Form->quantidade('Produto.' . $key . '.quantidade', ['value' => $this->Html->quantidade($value->qtde), 'label' => false, 'class' => 'input-sm desc-quantidade', 'append' => false, 'maxlength' => 10, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?></td>
                                                <td><?php echo $this->Form->input('Produto.' . $key . '.nome', ['value' => $value->produto->nome, 'label' => false, 'class' => 'input-sm desc-nome', 'disabled' => true, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?></td>
                                                <td><a href="#" class="btn btn-danger remove-linha" style="display: none;"><i class="fa fa-close"></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $this->Form->input('Produto.' . ($key + 1) . '.produto_id', ['type' => 'hidden', 'label' => false, 'class' => 'desc-produto-id']); ?>
                                                <?php echo $this->Form->input('Produto.' . ($key + 1) . '.codigo', ['label' => false, 'class' => 'input-sm busca-produto desc-codigo', 'append' => false, 'maxlength' => 32, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?>
                                            </td>
                                            <td><?php echo $this->Form->quantidade('Produto.' . ($key + 1) . '.quantidade', ['label' => false, 'class' => 'input-sm desc-quantidade', 'append' => false, 'maxlength' => 10, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?></td>
                                            <td><?php echo $this->Form->input('Produto.' . ($key + 1) . '.nome', ['label' => false, 'class' => 'input-sm desc-nome', 'disabled' => true, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?></td>
                                            <td><a href="#" class="btn btn-danger remove-linha" style="display: none;"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                        <?php
                                    } else {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $this->Form->input('Produto.0.produto_id', ['type' => 'hidden', 'label' => false, 'class' => 'desc-produto-id']); ?>
                                                <?php echo $this->Form->input('Produto.0.codigo', ['label' => false, 'class' => 'input-sm busca-produto desc-codigo', 'append' => false, 'maxlength' => 32, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?>
                                            </td>
                                            <td><?php echo $this->Form->numero('Produto.0.quantidade', ['label' => false, 'class' => 'input-sm desc-quantidade', 'append' => false, 'maxlength' => 10, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?></td>
                                            <td><?php echo $this->Form->input('Produto.0.nome', ['label' => false, 'class' => 'input-sm desc-nome', 'disabled' => true, 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-12']]); ?></td>
                                            <td><a href="#" class="btn btn-danger remove-linha" style="display: none;"><i class="fa fa-close"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

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
    </div>
</div>
<?php
echo $this->Html->script('/js/produtos_kits.js', ['block' => 'script']);
?>