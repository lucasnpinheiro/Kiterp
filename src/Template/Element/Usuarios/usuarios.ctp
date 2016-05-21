<?php
if (isset($pessoa->usuarios) AND count($pessoa->usuarios) > 0) {
    foreach ($pessoa->usuarios as $key => $value) {
        echo $this->Form->input('Usuario.id', ['type' => 'hidden', 'value' => $value->id]);
        echo $this->Form->input('Usuario.pessoa_id', ['type' => 'hidden', 'value' => $value->pessoa_id]);
        echo $this->Form->input('Usuario.username', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6'], 'value' => $value->username]);
        echo $this->Form->input('Usuario.senha', ['type' => 'password', 'value' => '', 'div' => ['class' => 'col-xs-12 col-md-6']]);
    }
} else {
    echo $this->Form->input('Usuario.id', ['type' => 'hidden']);
    echo $this->Form->input('Usuario.pessoa_id', ['type' => 'hidden']);
    echo $this->Form->input('Usuario.username', ['required' => true, 'div' => ['class' => 'col-xs-12 col-md-6']]);
    echo $this->Form->input('Usuario.senha', ['required' => true, 'type' => 'password', 'value' => '', 'div' => ['class' => 'col-xs-12 col-md-6']]);
}
?>

<div class="clearfix"></div>