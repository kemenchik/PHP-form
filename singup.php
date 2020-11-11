<?php
require "includes/db.php";
 $data  = $_POST;



 if(isset($data['do_signup']))
 {
     //register
     $errors = array();
     if(trim ($data['login']) == '')
     {
         $errors[] = 'Введите логин';
     }
     if(trim ($data['email']) == '')
     {
         $errors[] = 'Введите email';
     }
     if(trim ($data['pass']) == '')
     {
         $errors[] = 'Введите пароль';
     }
     if(trim ($data['pass']) != trim ($data['pass_2']))
     {
         $errors[] = 'Повторный пароль неверный';
     }
     if (R::count('users', "login = ?",array($data['login'])) > 0 )
     {
         $errors[] = 'Пользователь с таким логином уже существует';
     }
     if (R::count('users', "email = ?", array($data['email'])) > 0 )
     {
         $errors[] = 'Пользователь с таким email`ом уже существует';
     }
     if(empty($errors))
     {

         //проверка на поля прошла
         //регистрируем

         $user = R::dispense('users');
         $user -> login = $data['login'];
         $user -> email = $data['email'];
         $user -> password = password_hash($data['pass'], PASSWORD_DEFAULT);
         $user -> lvl = $data['lvl_select'];
         R::store($user);
         echo '<div style="color:green;">Вы зарегистрировались<br>
         Можете перейти на <a href="/">главную</a> страницу</div><hr>';
     }
else
     {
        //ошибка
         echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
     }
 }
?>

<form action="singup" method="post">

    <p>
       <p> <strong>Ваш логин</strong></p>
        <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>
    <p>
    <p> <strong>Ваш email</strong></p>
    <input type="email" name="email" value="<?php echo @$data['email']; ?>" >
    </p>
    <p>
    <p> <strong>Ваш пароль</strong></p>
    <input type="password" name="pass" value="<?php echo @$data['pass']; ?>">
    </p>
    <p>
    <p> <strong>Ваш пароль еще раз</strong></p>
    <input type="password" name="pass_2" value="<?php echo @$data['pass_2']; ?>">
    </p>
    <select name="lvl_select">
        <option value="1">Работник</option>
        <option  value="2">Менеджер</option>
        <option  value="3">Директор</option>
    </select>

    <p>
        <button type="submit" name="do_signup" >Зарегистрироваться</button>
    </p>
</form>
