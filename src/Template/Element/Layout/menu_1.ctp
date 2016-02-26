<?php
$lista_menus = $this->Html->listaMenus();
if (count($lista_menus)) {
    $lista_menus_array = [];
    foreach ($lista_menus as $key => $value) {
        $lista_menus_array[$value['grupos']][] = $value;
    }
}
?>

<nav class="navbar navbar-fixed-top" role="navigation">
    <div class="navbar-header navbar-default">
        <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <i class="fa fa-reorder"></i>
        </button>
        <a href="#" class="navbar-brand">Kiterp</a>
    </div>
    <div class="navbar-collapse collapse navbar-default" id="navbar">
        <ul class="nav navbar-nav">
            <?php
            if (count($lista_menus_array)) {
                foreach ($lista_menus_array as $key => $value) {
                    ?>

                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo h($key); ?> <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <?php
                            foreach ($value as $k => $v) {
                                $_params = [];
                                if ($v['parametros'] != '') {
                                    parse_str($v['parametros'], $_params);
                                }
                                $_params = array_merge($_params, ['plugin' => $v['plugin'], 'controller' => $v['controller'], 'action' => $v['action']]);
                                ?>
                                <li><?php echo $this->Html->link($v['titulo'], $_params, ['icon' => ($v['icone'] != '' ? $v['icone'] : false)]); ?></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>

                    <?php
                }
            }
            ?>


        </ul>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="<?php echo $this->Url->build('/usuarios/edit/' . $this->request->session()->read('Auth.User.id')) ?>">
                    <i class="fa fa-user"></i> <?php echo $this->request->session()->read('Auth.User.username'); ?>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Url->build('/usuarios/logout/') ?>">
                    <i class="fa fa-sign-out"></i> Sair
                </a>
            </li>
        </ul>
    </div>
</nav>