<?php
require "includes/db.php";
$data2  = $_POST;

// Это будут ссылки на сервер, внутренний или внешний

if (isset($data2['post_docs']) ) {

    $user = R::dispense('forlvl2');
    $user -> text = $data2['docs'];
    R::store($user);

}

?>

<form action="documentsForManagers.php" method="post">

    <p>
    <p> <strong>Ваш документ</strong></p>
    <input type="text" name="docs">
    </p>

    <p>
        <button type="submit" name="post_docs" >Отправить</button>
    </p>

</form>