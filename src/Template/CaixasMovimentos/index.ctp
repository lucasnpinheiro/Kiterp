<?php
$this->assign('title', $title);
$this->Html->addCrumb($this->fetch('title'), ['controller' => $this->request->params['controller'], 'action' => 'index']);
$this->Html->addCrumb('Consultar', null);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?= __('Lista de ' . $this->fetch('title')) ?></h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <?php echo $this->Form->create($caixasMovimento, ['url' => ['action' => 'add', $caixas_diario_id]]); ?>
                    <?php
                    echo $this->Form->input('caixas_diario_id', ['type' => 'hidden', 'value' => $caixas_diario_id]);
                    echo $this->Form->input('status', ['type' => 'hidden', 'value' => 1]);
                    echo $this->Form->statusMovimentos('grupo_id', ['required' => true, 'label' => 'Tipo', 'options' => [1 => 'Abertura', 2 => 'Entrada', 3 => 'Saída', 4 => 'Sangria'], 'empty' => true, 'div' => ['class' => 'col-xs-12 col-md-2']]);
                    echo $this->Form->moeda('valor', ['div' => ['required' => true, 'class' => 'col-xs-12 col-md-2']]);
                    echo $this->Form->input('descricao', ['required' => true, 'label' => 'Descrição', 'type' => 'text', 'div' => ['class' => 'col-xs-12 col-md-8'], 'append' => $this->Form->button(__('Submit'), ['class' => 'btn btn-primary'])]);
                    ?>
                    <?= $this->Form->end() ?>
                </div><!-- /.row -->

                <div class="table-responsive">
                    <table class="table table-bordered table-striped font-12 table-hover">
                        <thead>
                            <tr>
                                <th>Valor</th>
                                <th>Descrição</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($caixasMovimentos as $caixasMovimento): ?>
                                <tr>
                                    <td><?= $this->Html->moeda($caixasMovimento->valor) ?></td>
                                    <td><?= h($caixasMovimento->descricao) ?></td>
                                    <td><?= $this->Html->statusMovimentos($caixasMovimento->grupo_id) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->

            </div>
        </div>
    </div>

</div>