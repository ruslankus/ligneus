<?php if($errors):?>
<?foreach ($errors as $error):?>
<div class="error"><?=$error?></div>
<?endforeach?>
<?endif?>
    
    <h3>Вход в админ панель</h3>
    <form id="login" accept-charset="utf-8" method="post" action="<?=URL::base()?>auth/login">
        <p>
            <label for="username">Логин</label><br/>
            <input type="text" size="20" name="username">
        </p>
        <p>
            <label for="password">Пароль</label> <br/>
            <input type="password" size="20" name="password">
        </p>
        <p>
            <input id="log_submit" type="submit" value="Войти" name="submit"/>
        </p>
    </form>
