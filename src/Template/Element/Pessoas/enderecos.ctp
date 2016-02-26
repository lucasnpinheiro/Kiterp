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
                        if (isset($pessoa->pessoas_enderecos) AND count($pessoa->pessoas_enderecos) > 0) {
                            foreach ($pessoa->pessoas_enderecos as $key => $value) {
                                echo $this->Form->input('PessoasEndereco.' . $key . '.id', ['type' => 'hidden', 'value' => $value->id]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.pessoa_id', ['type' => 'hidden', 'value' => $value->pessoa_id]);
                                echo $this->Form->simNao('PessoasEndereco.' . $key . '.principal', ['div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->principal]);
                                echo $this->Form->tipoEndereco('PessoasEndereco.' . $key . '.tipo_endereco', ['label' => 'Tipo de Endereço', 'div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->tipo_endereco]);
                                echo $this->Form->cep('PessoasEndereco.' . $key . '.cep', ['onChange' => 'cake.util.getCep(this.value, "pessoasendereco-' . $key . '-");', 'div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->cep]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.endereco', ['label' => 'Endereço', 'div' => ['class' => 'col-xs-12 col-md-10'], 'value' => $value->endereco]);
                                echo $this->Form->numero('PessoasEndereco.' . $key . '.numero', ['label' => 'Número', 'div' => ['class' => 'col-xs-12 col-md-2'], 'value' => $value->numero]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.complemento', ['div' => ['class' => 'col-xs-12 col-md-6'], 'value' => $value->complemento]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.bairro', ['div' => ['class' => 'col-xs-12 col-md-6'], 'value' => $value->bairro]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.cidade', ['div' => ['class' => 'col-xs-12 col-md-6'], 'value' => $value->cidade]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.estado', ['div' => ['class' => 'col-xs-12 col-md-6'], 'value' => $value->estado]);
                            }
                        } else {
                            echo $this->Form->input('PessoasEndereco.0.id', ['type' => 'hidden']);
                            echo $this->Form->input('PessoasEndereco.0.pessoa_id', ['type' => 'hidden']);
                            echo $this->Form->simNao('PessoasEndereco.0.principal', ['div' => ['class' => 'col-xs-12 col-md-4']]);
                            echo $this->Form->tipoEndereco('PessoasEndereco.0.tipo_endereco', ['label' => 'Tipo de Endereço', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                            echo $this->Form->cep('PessoasEndereco.0.cep', ['onChange' => 'cake.util.getCep(this.value, "pessoasendereco-0-");', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                            echo $this->Form->input('PessoasEndereco.0.endereco', ['label' => 'Endereço', 'div' => ['class' => 'col-xs-12 col-md-10']]);
                            echo $this->Form->numero('PessoasEndereco.0.numero', ['label' => 'Número', 'div' => ['class' => 'col-xs-12 col-md-2']]);
                            echo $this->Form->input('PessoasEndereco.0.complemento', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                            echo $this->Form->input('PessoasEndereco.0.bairro', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                            echo $this->Form->input('PessoasEndereco.0.cidade', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                            echo $this->Form->input('PessoasEndereco.0.estado', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
