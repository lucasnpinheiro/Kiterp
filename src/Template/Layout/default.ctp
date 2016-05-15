<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php $this->assign('title', $title); ?>
        <title>Kiterp - <?php echo $this->fetch('title'); ?></title>

        <?php echo $this->Html->css('/css/bootstrap.min.css') ?>
        <?php echo $this->Html->css('/font-awesome/css/font-awesome.css') ?>
        <?php echo $this->Html->css('/css/animate.css') ?>
        <?php echo $this->Html->css('/js/plugins/bootstrap-datepicker/bootstrap-datepicker.css') ?>
        <?php echo $this->Html->css('/css/plugins/toastr/toastr.min.css') ?>
        <?php
        echo $this->Html->css('/js/plugins/select2/select2.min.css');
        echo $this->Html->css('/js/plugins/select2/select2-bootstrap.css');
        echo $this->Html->css('/css/style.css');
        ?>


        <?php echo $this->fetch('meta') ?>
        <?php echo $this->fetch('css') ?>
        <script>
            var router = {
                url: "<?php echo \Cake\Routing\Router::url('/', true); ?>",
                params: <?php echo json_encode($this->request->params); ?>
            };
        </script>

    </head>

    <body class="top-navigation">

        <div id="wrapper">
            <div id="page-wrapper" class="white-bg">
                <div class="row border-bottom white-bg">
                    <?php echo $this->element('Layout/menu_1'); ?>
                </div>
                <div class="container-fluid" style="margin-top: 35px; padding-bottom: 35px;">
                    <?php echo $this->element('Layout/header_title'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $this->Flash->render() ?>    
                        </div>
                    </div>
                    <div>
                        <?php echo $this->fetch('content') ?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="footer black-bg">
                    <div class="text-left col-xs-12 col-md-6">
                        Versão 01.00.01 - <strong>Kiterp</strong> Todos os direitos reservados
                    </div>
                    <div class="text-right col-xs-12 col-md-6">
                        <?php echo $this->Html->link('<i class="fa fa-user"></i> ' . $this->request->session()->read('Auth.User.nome'), '/usuarios/edit/' . $this->request->session()->read('Auth.User.id')); ?>
                        |
                        <?php echo $this->Html->link('<i class="fa fa-sign-out"></i> Sair', '/usuarios/logout/'); ?>
                    </div>
                </div>

            </div>
        </div>

        <?php echo $this->Html->script('/js/jquery.js') ?>
        <?php echo $this->Html->script('/js/bootstrap.min.js') ?>
        <?php echo $this->Html->script('/js/plugins/metisMenu/jquery.metisMenu.js') ?>
        <?php echo $this->Html->script('/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>
        <?php echo $this->Html->script('/js/plugins/pace/pace.min.js') ?>
        <?php echo $this->Html->script('/js/jquery.maskMoney.min.js') ?>
        <?php echo $this->Html->script('/js/jquery.mask.min.js') ?>
        <?php echo $this->Html->script('/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js') ?>
        <?php echo $this->Html->script('/js/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.js') ?>
        <?php echo $this->Html->script('/js/plugins/toastr/toastr.min.js') ?>
        <?php echo $this->Html->script('/js/bootbox.min.js') ?>
        <?php echo $this->Html->script('/js/inspinia.js') ?>
        <?php
        echo $this->Html->script('/js/plugins/select2/select2.min.js');
        echo $this->Html->script('/js/plugins/select2/select2.full.min.js');
        echo $this->Html->script('/js/plugins/select2/i18n/pt-BR.js');
        ?>
        <?php echo $this->Html->script('/js/Funcoes.js') ?>
        <?php echo $this->fetch('script') ?>

    </body>

</html>
