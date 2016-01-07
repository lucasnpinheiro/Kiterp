<div class="col-lg-12 div-pessoas-fisica" style="display: none;">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= __('Dados da Pessoa Fisica') ?></h5>
        </div>
        <div class="ibox-content">
            <?php
            echo $this->Form->input('PessoasFisica.id', ['type' => 'hidden']);
            echo $this->Form->input('PessoasFisica.pessoa_id', ['type' => 'hidden']);
            echo $this->Form->cpf('PessoasFisica.cpf', ['div' => ['class' => 'col-xs-12 col-md-4']]);
            echo $this->Form->input('PessoasFisica.rg', ['div' => ['class' => 'col-xs-12 col-md-4']]);
            echo $this->Form->data('PessoasFisica.data_nascimento', ['div' => ['class' => 'col-xs-12 col-md-4']]);
            ?>
            
        </div>
    </div>
</div>
