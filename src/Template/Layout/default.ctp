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
        <?php echo $this->Html->css('/css/style.css') ?>

        <?php echo $this->fetch('meta') ?>
        <?php echo $this->fetch('css') ?>
    </head>

    <body class="">

        <div id="wrapper">

            <?php echo $this->element('Layout/menu'); ?>

            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <?php echo $this->element('Layout/header_mensagens'); ?>
                </div>
                <div class="row wrapper border-bottom white-bg page-heading">
                    <?php echo $this->element('Layout/header_title'); ?>
                </div>

                <div class="wrapper wrapper-content">
                    <?php echo $this->fetch('content') ?>
                </div>
                <div class="footer">
                    <div>
                        <strong>Kiterp</strong> todos os direitos reservados
                    </div>
                </div>

            </div>
        </div>

        <?php echo $this->Html->script('/js/jquery-2.1.1.js') ?>
        <?php echo $this->Html->script('/js/bootstrap.min.js') ?>
        <?php echo $this->Html->script('/js/plugins/metisMenu/jquery.metisMenu.js') ?>
        <?php echo $this->Html->script('/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>
        <?php echo $this->Html->script('/js/inspinia.js') ?>
        <?php echo $this->Html->script('/js/plugins/pace/pace.min.js') ?>
        <?php echo $this->fetch('script') ?>

    </body>

</html>
