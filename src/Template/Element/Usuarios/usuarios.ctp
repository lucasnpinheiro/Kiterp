<div class="col-lg-12 div-usuarios" style="display: none;">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= __('Dados de login do Usuário') ?></h5>
        </div>
        <div class="ibox-content">
            <?php
            if (isset($pessoa->usuarios) AND count($pessoa->usuarios) > 0) {
                foreach ($pessoa->usuarios as $key => $value) {
                    echo $this->Form->input('Usuario.id', ['type' => 'hidden', 'value' => $value->id]);
                    echo $this->Form->input('Usuario.pessoa_id', ['type' => 'hidden', 'value' => $value->pessoa_id]);
                    echo $this->Form->input('Usuario.username', ['div' => ['class' => 'col-xs-12 col-md-6'], 'value' => $value->username]);
                    echo $this->Form->input('Usuario.senha', ['type' => 'password', 'value' => '', 'div' => ['class' => 'col-xs-12 col-md-6']]);
                }
            } else {
                echo $this->Form->input('Usuario.id', ['type' => 'hidden']);
                echo $this->Form->input('Usuario.pessoa_id', ['type' => 'hidden']);
                echo $this->Form->input('Usuario.username', ['div' => ['class' => 'col-xs-12 col-md-6']]);
                echo $this->Form->input('Usuario.senha', ['type' => 'password', 'value' => '', 'div' => ['class' => 'col-xs-12 col-md-6']]);
            }
            ?>
        </div>
    </div>
</div>
