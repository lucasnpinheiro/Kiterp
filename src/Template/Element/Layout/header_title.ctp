<div style="padding: 10px 0px">
    <?php $this->assign('title', $title); ?>
    <div class="col-sm-4">
        <h2><?php echo $this->fetch('title'); ?></h2>
    </div>
    <div class="col-sm-8">
        <div class="text-right title-action">
            <div class="text-right">


                <?php
                switch ($this->request->params['action']) {
                    case 'add':
                        echo $this->Html->linkPermissao('', ['action' => 'index', '?' => $this->request->query], ['class' => 'btn btn-info', 'icon' => 'list']);
                        break;
                    case 'edit':
                        echo $this->Html->linkPermissao('', ['action' => 'index', '?' => $this->request->query], ['class' => 'btn btn-info', 'icon' => 'list']);
                        echo $this->Html->linkPermissao('', ['action' => 'add', '?' => $this->request->query], ['class' => 'btn btn-success', 'icon' => 'plus-circle']);
                        if ($this->request->params['controller'] == 'Usuarios') {
                            if ($this->request->session()->read('Auth.User.id') != $this->request->params['pass'][0]) {
                                echo $this->Form->postLinkPermissao('', ['action' => 'delete', $this->request->params['pass'][0], '?' => $this->request->query], ['icon' => 'minus-circle', 'class' => 'btn btn-danger', 'confirm' => __('Tem certeza de que deseja o registro {0}?', $this->request->params['pass'][0])]);
                            }
                        } else {
                            echo $this->Form->postLinkPermissao('', ['action' => 'delete', $this->request->params['pass'][0]], ['icon' => 'minus-circle', 'class' => 'btn btn-danger', 'confirm' => __('Tem certeza de que deseja o registro {0}?', $this->request->params['pass'][0])]);
                        }

                        break;

                    default:
                        echo $this->Html->linkPermissao('', ['action' => 'index', '?' => $this->request->query], ['class' => 'btn btn-info', 'icon' => 'list']);
                        echo $this->Html->linkPermissao('', ['action' => 'add', '?' => $this->request->query], ['class' => 'btn btn-success', 'icon' => 'plus-circle']);
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</div>