<div>Главная страница</div>
<form>
    <?php if (empty($_SESSION)) : ?>
        <a href="<?= getURL("auth/registration"); ?>">Регистрация</a>
        <a href="<?= getURL("auth/login"); ?>">Вход</a>
    <?php else : ?>
        <h1>Поздравляю <?= $data['login']; ?> вы вошли, а теперь можете выйти =)</h1>
        <a href="<?= getURL("auth/logout"); ?>">Выход</a>
    <?php endif; ?>
</form>
