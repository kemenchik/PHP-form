<?php

require "includes/db.php";

$data2  = $_POST;
$query = R::getAll( 'SELECT * FROM forlvl2' );
foreach ($query as $item):?>

    <?=$item['text']?><br>
    <form action="checkByManager.php" method="post">

        <button type="submit" name="post_doc" value="<?=$item['id']?>">Отправить</button>

        <button type="submit" name="delete_doc" value="<?=$item['id']?>">Отклонить документ</button><br>
    </form>

<?php
endforeach;


if (isset($data2['post_doc']) ) {

   echo ($_POST['post_docs']);
   $doc = R::dispense("forlvl3");
   $text = R::load('forlvl2', $data2['post_docs']);

    R::hunt('forlvl2', 'id = ?', [$text -> id]);

   $doc -> text = $text -> text;
    R::store($doc);
}

if (isset($data2['delete_doc']) ) {

    $text = R::load('forlvl2', $data2['delete_doc']);
    R::hunt('forlvl2', 'id = ?', [$text -> id]);
}

        ?>