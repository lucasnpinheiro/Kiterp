<?php $this->assign('title', 'Administração'); ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->fetch('title') ?></title>
        <?php echo $this->Html->css('/css/bootstrap.min.css') ?>
        <?php echo $this->Html->css('/font-awesome/css/font-awesome.css') ?>
        <?php
        echo $this->Html->css('/css/style.css');
        echo $this->Html->css('/css/print.css');
        ?>
    </head>

    <body style="width: 800px;">

        <div>
            <?= $this->fetch('content') ?>
        </div>
        <script type="text/javascript">
            window.print();
            setTimeout(function () {
                window.location.href = "<?php echo $redirect; ?>";
            }, 3000);

        </script>

    </body>
</html>