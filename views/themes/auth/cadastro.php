<?php $v->layout("themes/template_auth"); ?>
<?php $v->start("css"); ?>
    <link rel="stylesheet" href="<?= asset("css/cadastro.css"); ?>">
<?php $v->end(); ?>
<div class="ml-4 mt-2">
    <a href="<?= $router->route('web.index') ?>" class="logo">
        <img src="<?= asset('img/logo.png') ?>" width="65">
    </a>
</div>
<div class="container-fluid">
    <?php if ($type == "U") :?>
        <div class="midia">
            <div class=" mb-4 mr-5 midia-box">
                <a href="<?=$router->route('auth.google', ["type" => $type]) ?>">
                    <img src="<?= asset('img/icons/google-logo.png') ?>" width="30">
                    cadastrar com o google
                </a>
            </div>
            <div class="midia-box facebook">
                <a href="<?=$router->route('auth.facebook', ["type" => $type]) ?>">
                    <img src="<?= asset('img/icons/facebook-logo.png') ?>" width="30">
                    cadastrar com o facebook
                </a>
            </div>
    </div>
    <?php else: ?>
        <h3 class="text-center">Cadastre já e veja <span class="blue-bg">todos os serviços</span> que estão disponíveis para você! </h3>
    <?php endif; ?>
    <div class="row">
        <div class="col-3 text-left">
                <img src="<?=asset('img/img-signup-left.png')  ?>" class="mr-5">
        </div>

        <div class="col text-center">
            <form action="<?= site().'/register' ?>" enctype="multipart/form-data">
                <input type="hidden" name="type" value="<?=$type?>">
                <div class="row ">
                    <div class="col mt-4">
                        
                        <input type="text" class="input_names w-100" placeholder="Digite seu nome" name="nome" value="<?= $data->nome ?>" required>
                        <input type="text" class="input_names w-100" placeholder="Digite seu sobrenome" name="snome" value="<?= $data->Snome ?>" required>
                        
                    </div>
                </div>
                <div class="w-100 mt-3"></div>
                <input type="email" placeholder="digite seu email" class="rounded input_second w-100"  name="email" value="<?= $data->email ?>" required>
                <input type="password" placeholder="digite sua senha" class="rounded input_second w-100 mt-3 mb-3" name="passwd" required>
                <input type="text" placeholder="digite seu CPF" name="cpf" class="cpf" id="cpf" required> Nascimento: <input type="date" required name="nasc">
                <div class="w-100 mb-3" id="result-validate"></div>
                bio:<br>
                <textarea id="bio" name="bio"></textarea><p class="mb-3">
                ao clicar em cadastrar você aceita os <a href="<?= $router->route('web.terms') ?>">Termos de uso</a>.
                <button type="submit" class="btn btn-primary w-100 mt-3">Cadastrar </button>
            </form>
        </div>
        <div class="col-3 ">
            <img src="<?=asset('img/img-right.png') ?>" alt="">
        </div>
    </div>
</div>
<?php $v->start("scripts"); ?>
    <script src="<?= asset("js/cadastro.js"); ?>"></script>
<?php $v->end(); ?>