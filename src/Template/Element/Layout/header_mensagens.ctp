<nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <?php echo $this->element('Layout/header_mensagens_1'); ?>
        <?php echo $this->element('Layout/header_mensagens_2'); ?>
        <li>
            <a href="<?php echo $this->Url->build('/usuarios/edit/' . $this->request->session()->read('Auth.User.id')) ?>">
                <i class="fa fa-user"></i> <?php echo $this->request->session()->read('Auth.User.nome'); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo $this->Url->build('/usuarios/logout/') ?>">
                <i class="fa fa-sign-out"></i> Sair
            </a>
        </li>
    </ul>

</nav>
