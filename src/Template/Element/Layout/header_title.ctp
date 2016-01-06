<?php $this->assign('title', $title); ?>
<div class="col-sm-4">
    <h2><?php echo $this->fetch('title'); ?></h2>
    <?php echo $this->Html->getCrumbs(' > ', 'Home'); ?>
</div>
<div class="col-sm-8">
    <div class="text-right title-action">
        <div class="btn-group text-right">


            <?php
            switch ($this->request->params['action']) {
                case 'add':
                    echo $this->Html->link('Consultar', ['action' => 'index'], ['class' => 'btn btn-info', 'icon' => 'list']);
                    break;
                case 'edit':
                    echo $this->Html->link('Consultar', ['action' => 'index'], ['class' => 'btn btn-info', 'icon' => 'list']);
                    echo $this->Html->link('Cadastrar', ['action' => 'add'], ['class' => 'btn btn-success', 'icon' => 'plus-circle']);
                    if ($this->request->params['controller'] == 'Usuarios') {
                        if ($this->request->session()->read('Auth.User.id') != $this->request->params['pass'][0]) {
                            echo $this->Form->postLink('Excluir', ['action' => 'delete', $this->request->params['pass'][0]], ['icon' => 'minus-circle', 'class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $this->request->params['pass'][0])]);
                        }
                    } else {
                        echo $this->Form->postLink('Excluir', ['action' => 'delete', $this->request->params['pass'][0]], ['icon' => 'minus-circle', 'class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $this->request->params['pass'][0])]);
                    }

                    break;

                default:
                    echo $this->Html->link('Consultar', ['action' => 'index'], ['class' => 'btn btn-info', 'icon' => 'list']);
                    echo $this->Html->link('Cadastrar', ['action' => 'add'], ['class' => 'btn btn-success', 'icon' => 'plus-circle']);
                    break;
            }
            ?>
        </div>
    </div>
</div>
