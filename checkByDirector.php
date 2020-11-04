<?php

require "includes/db.php";

$query = R::getAll( 'SELECT * FROM forlvl3' );
echo($query['text']);



?>

<?php
foreach ($query as $item):
    ?>
    <?=$item['text']?><br>
    <button name="postForDirector">Подтвердить документ</button>
    <button name="deleteDoc">Отклонить документ</button><br>


<?php
endforeach;
?>