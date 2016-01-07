<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= __('Dados de Endereços') ?></h5>
            <div class="ibox-tools">
                <button type="button" class="btn btn-primary enderecos-add-field">+</button>
            </div>
        </div>
        <div class="ibox-content">
            <div class="enderecos-multi-field-wrapper">
                <div class="enderecos-multi-fields">
                    <div class="enderecos-multi-field col-xs-12">
                        
                        <?php
                        echo $this->Form->input('PessoasEndereco.0.id', ['type' => 'hidden']);
                        echo $this->Form->input('PessoasEndereco.0.pessoa_id', ['type' => 'hidden']);
                        echo $this->Form->simNao('PessoasEndereco.0.principal', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->tipoEndereco('PessoasEndereco.0.tipo_endereco', ['label' => 'Tipo de Endereço', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->cep('PessoasEndereco.0.cep', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                        echo $this->Form->input('PessoasEndereco.0.endereco', ['label' => 'Endereço', 'div' => ['class' => 'col-xs-12 col-md-10']]);
                        echo $this->Form->numero('PessoasEndereco.0.numero', ['label' => 'Número', 'div' => ['class' => 'col-xs-12 col-md-2']]);
                        echo $this->Form->input('PessoasEndereco.0.complemento', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('PessoasEndereco.0.bairro', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('PessoasEndereco.0.cidade', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                        echo $this->Form->input('PessoasEndereco.0.estado', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
