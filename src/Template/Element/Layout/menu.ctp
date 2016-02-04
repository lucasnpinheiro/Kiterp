<?php
$lista_menus = $this->Html->listaMenus();
if (count($lista_menus)) {
    $lista_menus_array = [];
    foreach ($lista_menus as $key => $value) {
        $lista_menus_array[$value['grupos']][] = $value;
    }
}
?>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <?php
            if (count($lista_menus_array)) {
                foreach ($lista_menus_array as $key => $value) {
                    ?>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label"><?php echo h($key); ?></span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <?php foreach ($value as $k => $v) {
                                ?>
                                <li><?php echo $this->Html->link($v['titulo'], ['plugin' => $v['plugin'], 'controller' => $v['controller'], 'action' => $v['action']], ['icon' => ($v['icone'] != '' ? $v['icone'] : false)]); ?></li>
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
    </div>
</nav>