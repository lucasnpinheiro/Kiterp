<div class="col-lg-12 div-pessoas-juridica" style="display: none;">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= __('Dados da Pessoa Juridica') ?></h5>
        </div>
        <div class="ibox-content">
            <?php
            echo $this->Form->input('PessoasJuridica.id', ['type' => 'hidden']);
            echo $this->Form->input('PessoasJuridica.pessoa_id', ['type' => 'hidden']);
            echo $this->Form->cnpj('PessoasJuridica.cnpj', ['div' => ['class' => 'col-xs-12 col-md-4']]);
            echo $this->Form->input('PessoasJuridica.inscricao_estadual', ['div' => ['class' => 'col-xs-12 col-md-4']]);
            echo $this->Form->input('PessoasJuridica.inscricao_municipal', ['div' => ['class' => 'col-xs-12 col-md-4']]);
            echo $this->Form->data('PessoasJuridica.data_abertura', ['div' => ['class' => 'col-xs-12 col-md-4']]);
            echo $this->Form->input('PessoasJuridica.cnai', ['div' => ['class' => 'col-xs-12 col-md-4']]);
            ?>
            
        </div>
    </div>
</div>
