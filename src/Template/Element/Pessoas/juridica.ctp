<div class="div-pessoas-juridica" style="display: none;">
    <?php
    if (isset($pessoa->pessoas_juridicas) AND count($pessoa->pessoas_juridicas) > 0) {
        foreach ($pessoa->pessoas_juridicas as $key => $value) {
            echo $this->Form->input('PessoasJuridica.id', ['type' => 'hidden', 'value' => $value->id]);
            echo $this->Form->input('PessoasJuridica.pessoa_id', ['type' => 'hidden', 'value' => $value->pessoa_id]);
            echo $this->Form->cnpj('PessoasJuridica.cnpj', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->cnpj]);
            echo $this->Form->input('PessoasJuridica.inscricao_estadual', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->inscricao_estadual]);
            echo $this->Form->input('PessoasJuridica.inscricao_municipal', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->inscricao_municipal]);
            echo $this->Form->data('PessoasJuridica.data_abertura', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->data_abertura->format('d/m/Y')]);
            echo $this->Form->input('PessoasJuridica.cnai', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->cnai]);
        }
    } else {
        echo $this->Form->input('PessoasJuridica.id', ['type' => 'hidden']);
        echo $this->Form->input('PessoasJuridica.pessoa_id', ['type' => 'hidden']);
        echo $this->Form->cnpj('PessoasJuridica.cnpj', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('PessoasJuridica.inscricao_estadual', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('PessoasJuridica.inscricao_municipal', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->data('PessoasJuridica.data_abertura', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('PessoasJuridica.cnai', ['div' => ['class' => 'col-xs-12 col-md-4']]);
    }
    ?>
    <div class="clearfix"></div>
    <div class="hr-line-dashed"></div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>