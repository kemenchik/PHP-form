<?php
require "includes/db.php"
    ?>

<?php if(isset($_SESSION['logged_user']) ) : ?>
Авторизован, <?php echo $_SESSION['logged_user']->login; ?><br>
Ваш уровень: <?php echo $_SESSION['logged_user']->lvl; ?>
<hr>
<a href="/logout.php">Выйти</a>
    <a href="/checkForManager"></a>
<?php else : ?>
<a href="/login.php"> Авторизоваться </a> <br>
<a href="singup.php"> Зарегистрироваться </a>
<?php endif; ?> <br>
<?php if($_SESSION['logged_user']->lvl == 1) : ?>

<a href="/documentsForManagers.php">Добавить доков</a>

<?php endif; ?>

<?php if($_SESSION['logged_user']->lvl == 2) : ?>

    <a href="/checkByManager.php">Просмотреть доки</a>

<?php endif; ?>

<?php if($_SESSION['logged_user']->lvl == 3) : ?>

    <a href="/checkByDirector.php">Одобрить доки</a>

<?php endif; ?>


