<div class="col-xs-2 col-sm-3 col-md-4"></div>
<div class="col-xs-8 col-sm-6 col-md-4 text-center grid-login">
    <div class="text-center">
        <h1>Kiterp</h1>
        <p>Área restrita</p>
        <p class="login-box-msg"><?= $this->Flash->render('auth') ?></p>
        <?= $this->Form->create(null, ['url' => '/usuarios/login']) ?>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required="">
        </div>
        <div class="form-group">
            <input type="password" name="senha" class="form-control" placeholder="Senha" required="">
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-sign-in" aria-hidden="true"></i> Logar</button>
        <?= $this->Form->end() ?>
    </div>
</div>
<div class="col-xs-2 col-sm-3 col-md-4"></div>