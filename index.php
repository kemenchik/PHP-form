<?php
require "includes/db.php"
    ?>

<?php if(isset($_SESSION['logged_user']) ) : ?>
Авторизован, <?php echo $_SESSION['logged_user']->login; ?>
<hr>
<a href="/logout.php">Выйти</a>
<?php else : ?>
<a href="/login.php"> Авторизоваться </a> <br>
<a href="singup.php"> Зарегистрироваться </a>
<?php endif; ?>