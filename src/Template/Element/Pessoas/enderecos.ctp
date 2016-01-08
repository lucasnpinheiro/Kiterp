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
                        if (count($pessoa->pessoas_enderecos) > 0) {
                            foreach ($pessoa->pessoas_enderecos as $key => $value) {
                                echo $this->Form->input('PessoasEndereco.' . $key . '.id', ['type' => 'hidden', 'value' => $value->id]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.pessoa_id', ['type' => 'hidden', 'value' => $value->pessoa_id]);
                                echo $this->Form->simNao('PessoasEndereco.' . $key . '.principal', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->principal]);
                                echo $this->Form->tipoEndereco('PessoasEndereco.' . $key . '.tipo_endereco', ['required' => true, 'label' => 'Tipo de Endereço', 'div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->tipo_endereco]);
                                echo $this->Form->cep('PessoasEndereco.' . $key . '.cep', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4'], 'value' => $value->cep]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.endereco', ['required' => true, 'label' => 'Endereço', 'div' => ['class' => 'col-xs-12 col-md-10'], 'value' => $value->endereco]);
                                echo $this->Form->numero('PessoasEndereco.' . $key . '.numero', ['required' => true, 'label' => 'Número', 'div' => ['class' => 'col-xs-12 col-md-2'], 'value' => $value->numero]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.complemento', ['div' => ['class' => 'col-xs-12 col-md-6'], 'value' => $value->complemento]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.bairro', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6'], 'value' => $value->bairro]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.cidade', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6'], 'value' => $value->cidade]);
                                echo $this->Form->input('PessoasEndereco.' . $key . '.estado', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6'], 'value' => $value->estado]);
                            }
                        } else {
                            echo $this->Form->input('PessoasEndereco.0.id', ['type' => 'hidden']);
                            echo $this->Form->input('PessoasEndereco.0.pessoa_id', ['type' => 'hidden']);
                            echo $this->Form->simNao('PessoasEndereco.0.principal', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                            echo $this->Form->tipoEndereco('PessoasEndereco.0.tipo_endereco', ['required' => true, 'label' => 'Tipo de Endereço', 'div' => ['class' => 'col-xs-12 col-md-4']]);
                            echo $this->Form->cep('PessoasEndereco.0.cep', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-4']]);
                            echo $this->Form->input('PessoasEndereco.0.endereco', ['required' => true, 'label' => 'Endereço', 'div' => ['class' => 'col-xs-12 col-md-10']]);
                            echo $this->Form->numero('PessoasEndereco.0.numero', ['required' => true, 'label' => 'Número', 'div' => ['class' => 'col-xs-12 col-md-2']]);
                            echo $this->Form->input('PessoasEndereco.0.complemento', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                            echo $this->Form->input('PessoasEndereco.0.bairro', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                            echo $this->Form->input('PessoasEndereco.0.cidade', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                            echo $this->Form->input('PessoasEndereco.0.estado', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
