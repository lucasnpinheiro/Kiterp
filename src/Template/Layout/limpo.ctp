<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php $this->assign('title', $title); ?>
        <title>Kiterp - <?php echo $this->fetch('title'); ?></title>
        <script>
            var router = {
                url: "<?php echo \Cake\Routing\Router::url('/', true); ?>",
                params: <?php echo json_encode($this->request->params); ?>
            };
        </script>
    </head>

    <body>
        <?php echo $this->fetch('content') ?>
        <?php echo $this->fetch('script') ?>
    </body>
</html>