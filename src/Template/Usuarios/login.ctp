<div class="middle-box text-center loginscreen animated fadeInDown" style="max-width: 50%; width: 50%">
    <div class="text-center">
        <h1 class="logo-name">Kiterp</h1>
        <p>Área restrita</p>
        <p class="login-box-msg"><?= $this->Flash->render('auth') ?></p>
        <?= $this->Form->create(null, ['url' => '/usuarios/login', 'class' => 'm-t']) ?>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required="">
        </div>
        <div class="form-group">
            <input type="password" name="senha" class="form-control" placeholder="Senha" required="">
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Logar</button>
        <?= $this->Form->end() ?>
    </div>
</div>