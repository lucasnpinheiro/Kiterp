<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Cadastrar', null);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Cadastrar ' . $this->fetch('title')) ?></h5>
            </div>
            <div class="ibox-content">
                <div>
                    <?= $this->Form->create($parametro, ['url' => ['action' => 'save']]) ?>

                    <?php
                    $grupos = [];
                    foreach ($parametros as $key => $value) {
                        $grupos[$value->grupo][] = $value;
                    }
                    ?>
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
                        $active = TRUE;
                        foreach ($grupos as $k => $v) {
                            ?>
                            <li role="presentation"  class="<?php echo ($active === true ? 'active' : ''); ?>"><a href="#<?php echo Cake\Utility\Inflector::underscore($k); ?>" aria-controls="<?php echo Cake\Utility\Inflector::underscore($k); ?>" role="tab" data-toggle="tab"><?php echo $k; ?></a></li>
                            <?php
                            $active = FALSE;
                        }
                        ?>
                    </ul>
                    <div class="tab-content">

                        <?php
                        $active = TRUE;
                        foreach ($grupos as $k => $v) {
                            ?>
                            <div role="tabpanel" class="tab-pane <?php echo ($active === true ? 'active' : ''); ?>" id="<?php echo Cake\Utility\Inflector::underscore($k); ?>">
                                <?php
                                $active = FALSE;
                                foreach ($v as $key => $value) {
                                    $options = [
                                        'value' => $value->valor,
                                        'label' => $value->nome,
                                        'required' => $value->required,
                                        'type' => 'text',
                                    ];
                                    if ($value->opcoes) {
                                        $options['options'] = json_decode($value->opcoes, true);
                                    }
                                    switch ($value->tipo) {
                                        case 1:
                                            echo $this->Form->numero('paramentros.' . $value->id . '.valor', $options);
                                            break;
                                        case 2:
                                            echo $this->Form->input('paramentros.' . $value->id . '.valor', $options);
                                            break;
                                        case 3:
                                            $options['type'] = 'textarea';
                                            echo $this->Form->input('paramentros.' . $value->id . '.valor', $options);
                                            break;
                                        case 4:
                                            $options['type'] = 'select';
                                            echo $this->Form->input('paramentros.' . $value->id . '.valor', $options);
                                            break;
                                        case 5:
                                            echo $this->Form->moeda('paramentros.' . $value->id . '.valor', $options);
                                            break;
                                        case 6:
                                            echo $this->Form->juros('paramentros.' . $value->id . '.valor', $options);
                                            break;

                                        default:
                                            echo $this->Form->input('paramentros.' . $value->id . '.valor', $options);
                                            break;
                                    }
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-12 text-right">
                        <?= $this->Form->button(__('Salvar', ['class' => 'btn btn-primary'])) ?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>