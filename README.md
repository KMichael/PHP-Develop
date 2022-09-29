<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p>Веб-ресурс "книжного магазина".</p>
<p>Есть панель администратора, где возможны операции с пользователями, книгами и книжными жанрами.</p>
<label>Операции:</label>
<ul>
<li>Создание;</li>
<li>Просмотр;</li>
<li>Редактирование;</li>
<li>Удаление.</li>
</ul>
<label>Таблицы в базе данных:</label>
<ul>
    <li>Авторы -> Книги (Один ко многим)</li>
    <li>Книги -> Жанры (Многие ко многим)</li>
</ul>
<p>Роль администратора выполнена через middleware, и задаётся в базе данных через поле "admin"</p>
<p>Авторизация и регистрация - Laravel UI auth</p>
<p>Так же в репозитории есть дамп базы данных - <b>bstore.sql</b></p>
<p>PHP 8.1.10/Laravel 9.31.0/mariaDB-10.5</p>
