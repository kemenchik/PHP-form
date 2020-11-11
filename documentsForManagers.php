<?php
require "includes/db.php";

if($_SESSION['logged_user']->lvl == 1) :

$data2  = $_POST;

// Это будут ссылки на сервер, внутренний или внешний

if (isset($data2['post_docs']) ) {

    $user = R::dispense('forlvl2');
    $user -> text = $data2['docs'];
    R::store($user);

}

?>

<form action="documentsForManagers" method="post">

    <p>
    <p> <strong>Ваш документ</strong></p>
    <input type="text" name="docs">
    </p>

    <p>
        <button type="submit" name="post_docs" >Отправить</button>
    </p>

</form>

<? else:
    echo "Доступ запрещен, т.к. ваш уровень: ";
    echo $_SESSION['logged_user']->lvl;

endif ?>