<div class="col-lg-12 div-pessoas-fisica" style="display: none;">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= __('Dados da Pessoa Fisica') ?></h5>
        </div>
        <div class="ibox-content">
            <?php
            if (isset($pessoa->pessoas_fisicas) AND count($pessoa->pessoas_fisicas) > 0) {
                foreach ($pessoa->pessoas_fisicas as $key => $value) {
                    echo $this->Form->input('PessoasFisica.id', ['type' => 'hidden', 'value' => $value->id]);
                    echo $this->Form->input('PessoasFisica.pessoa_id', ['type' => 'hidden', 'value' => $value->pessoa_id]);
                    echo $this->Form->cpf('PessoasFisica.cpf', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->cpf]);
                    echo $this->Form->input('PessoasFisica.rg', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->rg]);
                    echo $this->Form->data('PessoasFisica.data_nascimento', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->data_nascimento->format('d/m/Y')]);
                }
            } else {
                echo $this->Form->input('PessoasFisica.id', ['type' => 'hidden']);
                echo $this->Form->input('PessoasFisica.pessoa_id', ['type' => 'hidden']);
                echo $this->Form->cpf('PessoasFisica.cpf', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->input('PessoasFisica.rg', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                echo $this->Form->data('PessoasFisica.data_nascimento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
            }
            ?>

        </div>
    </div>
</div>
