<div class="clearfix"></div>
<div class="col-xs-12">
    <?php
    echo $this->Form->label('Tipo de Associação');
    $_associacoes = [
        1 => null,
        2 => null,
        3 => null,
        4 => null,
        5 => null,
        6 => null,
        7 => null,
    ];
    if (count($pessoa->pessoas_associacoes)) {
        foreach ($pessoa->pessoas_associacoes as $key => $value) {
            $_associacoes[(int) $value->tipo_associacao] = 'checked="checked"';
        }
    }
    ?>
</div>
<div class="checkbox ">
    <div class="col-xs-12 col-md-2">
        <label for="pessoasassociacao-usuario">
            <input name="PessoasAssociacao[tipo_associacao][]" <?php echo $_associacoes[7]; ?> value="7" title="Usuário" id="pessoasassociacao-usuario" type="checkbox">Usuário
        </label>
    </div>
    <div class="col-xs-12 col-md-2">
        <label for="pessoasassociacao-cliente">
            <input name="PessoasAssociacao[tipo_associacao][]" <?php echo $_associacoes[2]; ?> value="2" title="Cliente" id="pessoasassociacao-cliente" type="checkbox">Cliente
        </label>
    </div>
    <div class="col-xs-12 col-md-2">
        <label for="pessoasassociacao-fornecedor">
            <input name="PessoasAssociacao[tipo_associacao][]" <?php echo $_associacoes[3]; ?> value="3" title="Fornecedor" id="pessoasassociacao-fornecedor" type="checkbox">Fornecedor
        </label>
    </div>
    <div class="col-xs-12 col-md-2">
        <label for="pessoasassociacao-funcionario">
            <input name="PessoasAssociacao[tipo_associacao][]" <?php echo $_associacoes[6]; ?> value="6" title="Funcionario" id="pessoasassociacao-funcionario" type="checkbox">Funcionario
        </label>
    </div>
    <div class="col-xs-12 col-md-2">
        <label for="pessoasassociacao-vendedor">
            <input name="PessoasAssociacao[tipo_associacao][]" <?php echo $_associacoes[4]; ?> value="4" title="Vendedor" id="pessoasassociacao-vendedor" type="checkbox">Vendedor
        </label>
    </div>
    <div class="col-xs-12 col-md-2">
        <label for="pessoasassociacao-representante">
            <input name="PessoasAssociacao[tipo_associacao][]" <?php echo $_associacoes[5]; ?> value="5" title="Representante" id="pessoasassociacao-representante" type="checkbox">Representante
        </label>
    </div>
</div>
<div class="clearfix"></div>