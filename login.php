<?php
require "includes/db.php";
$data  = $_POST;
if (isset($data['do_login']) )
{
    $errors = array();

    $user = R::findOne('users', 'login = ?', array($data['login'] ) );
    if ($user )
    {
        //login exist
      if(  password_verify($data['pass'], $user->password))
      {
        //logging
          $_SESSION['logged_user'] = $user;
          echo '<div style="color:green;">Вы авторизованы<br/>
          Можете перейти на <a href="/">главную</a> страницу</div><hr>';
      }
      else
      {
          $errors[] = 'Неправильный пароль';
      }
    }
    else{
        $errors [] = 'Такой пользователь не найден';
    }
    if(!empty($errors))
    {
        //проверка на поля прошла
        //logging
        echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
}
?>
<form action="login.php" method="post">

    <p>
    <p> <strong>Ваш логин</strong></p>
    <input type="text" name="login" value="<?php echo @$data['login']; ?>">
    </p>
    <p>
    <p> <strong>Ваш пароль</strong></p>
    <input type="password" name="pass" value="<?php echo @$data['pass']; ?>">
    </p>
    <p>
        <button type="submit" name="do_login" >Войти</button>
    </p>

</form>
