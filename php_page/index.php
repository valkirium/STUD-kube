<?php
    session_start();
    require_once("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ну привет</title>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet"  type="text/css"/>
</head>
<body>
    <div id="auth_block" >
        <?php
        //-----------------Проверка, прошел ли пользователь аутентификацию-----------------
        if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
            //-----------------если нет, то выводим блок с ссылками на страницу регистрации и аутентификации-----------------
            ?>
            <div class="container">
                <div class="centered">
                    <h2 class="textStyle">Привет, друг! </h2>
                    <h4 class="textStyle2">Если у тебя уже есть аккаунт, нажми на кнопку аутентификации</h4>
                    <h4 class="textStyle2"> Если нет, то нажми на кнопку регистрации</h4>
                    <table class="centered_block">
                        <tr>
                            <td>
                                <div id="link_register">
                                    <a href="/form_register.php" class="butt">Регистрация</a>
                                </div>
                            </td>
                            <td>
                                <div id="link_auth">
                                    <a href="/form_auth.php" class="butt">Аутентификация</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php
        }else{
            //-----------------Если пользователь аутентифицирован, то выводим ссылку Выход-----------------
            $query = ("select user_name from public.user where login ='".$_SESSION["login"]."'");
            $result = pg_query($query);
            $name = pg_fetch_row($result);
            ?>
            <div id="link_logout" class="centered9">
                <a href="/logout.php" class="butt">Выход</a>
            </div>
<!-------------------Далее выводим блок для с сылкой на страницу с формой для послания------------------->
            <div class="container">
                <div class="centered">
                    <form method="post">
                        <h2 class="textStyle">Привет, <?php echo $name[0]?>!</h2>
                        <p class="textStyle">Оставь послание будущим посетителям сайта</p>
                        <button type="button" class="butt4" onClick='location.href="/form.php"'>Передай привет</button>
                    </form>
                </div>
            </div>
            <?php
        }
        $postgre = pg_close();
        ?>
    </div>
</body>
</html>