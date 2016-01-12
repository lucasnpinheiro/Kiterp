<!DOCTYPE html>
<html>

    <head>
        <?php echo $this->Html->charset() ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php echo $this->fetch('title') ?>
        </title>
        <?php echo $this->Html->meta('icon') ?>
        <?php echo $this->fetch('meta') ?>
        <?php echo $this->Html->css('/css/bootstrap.min.css') ?>
        <?php echo $this->Html->css('/font-awesome/css/font-awesome.css') ?>
        <?php echo $this->Html->css('/css/animate.css') ?>
        <?php echo $this->Html->css('/css/style.css') ?>
        <?php echo $this->fetch('css') ?>
    </head>

    <body class="gray-bg">

        <?php echo $this->fetch('content') ?>

        <!-- Mainly scripts -->
        <?php echo $this->Html->script('/js/jquery.js') ?>
        <?php echo $this->Html->script('/js/bootstrap.min.js') ?>
        <?php echo $this->fetch('script') ?>
    </body>

</html>


