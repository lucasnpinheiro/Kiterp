<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= __('Dados dos Contatos') ?></h5>
            <div class="ibox-tools">
                <button type="button" class="btn btn-primary contatos-add-field">+</button>
            </div>
        </div>
        <div class="ibox-content">
            <div class="contatos-multi-field-wrapper">
                <div class="contatos-multi-fields">
                    <div class="contatos-multi-field col-xs-12">
                        <?php
                        echo $this->Form->input('PessoasContato.0.id', ['type' => 'hidden']);
                        echo $this->Form->input('PessoasContato.0.pessoa_id', ['type' => 'hidden']);
                        echo $this->Form->input('PessoasContato.0.tipos_contato_id', ['options' => $tipos_contatos, 'empty' => 'Selecione um tipo de contato', 'div' => ['class' => 'col-xs-12 col-md-5']]);
                        echo $this->Form->input('PessoasContato.0.valor', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
