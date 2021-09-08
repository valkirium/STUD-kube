<?php
    $postgre = pg_connect("host=pghost port=5432 user=postgres password=1234 dbname=postgres");
    //-----------------Проверяем, успешность соединения-----------------
    if (!$postgre) {
        die("<p><strong>Ошибка подключения к БД</strong></p><p><strong>Код ошибки: </strong> ". $postgre->connect_errno ." </p><p><strong>Описание ошибки:</strong> ".$postgre->connect_error."</p>");
    }
    //-----------------Добавление переменной, которая будет содержать адрес (URL) сайта
    $server_ip = gethostbyname($_SERVER['SERVER_NAME']);
    $address_site = "http://$server_ip:8080";
?>
