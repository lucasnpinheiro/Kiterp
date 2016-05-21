<div class="div-pessoas-fisica" style="display: none;">

    <?php
    if (isset($pessoa->pessoas_fisicas) AND count($pessoa->pessoas_fisicas) > 0) {
        foreach ($pessoa->pessoas_fisicas as $key => $value) {
            echo $this->Form->input('PessoasFisica.id', ['type' => 'hidden', 'value' => $value->id]);
            echo $this->Form->input('PessoasFisica.pessoa_id', ['type' => 'hidden', 'value' => $value->pessoa_id]);
            echo $this->Form->cpf('PessoasFisica.cpf', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->cpf]);
            echo $this->Form->input('PessoasFisica.rg', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->rg]);
            echo $this->Form->data('PessoasFisica.data_nascimento', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => (!empty($value->data_nascimento) ? $value->data_nascimento->format('d/m/Y') : null)]);
        }
    } else {
        echo $this->Form->input('PessoasFisica.id', ['type' => 'hidden']);
        echo $this->Form->input('PessoasFisica.pessoa_id', ['type' => 'hidden']);
        echo $this->Form->cpf('PessoasFisica.cpf', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->input('PessoasFisica.rg', ['div' => ['class' => 'col-xs-12 col-md-4']]);
        echo $this->Form->data('PessoasFisica.data_nascimento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
    }
    ?>
    <div class="clearfix"></div>
    <div class="hr-line-dashed"></div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>