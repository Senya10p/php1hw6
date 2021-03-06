<?php

require __DIR__ . '/classes/GuestBook.php';

?>
<html>
<head>
    <title>PHP-1</title>
</head>
<body>
    <h1>PHP</h1>
    <h2>6 урок</h2>
    <h2>Классы и объекты. Введение в ООП</h2>
    <h4>Домашняя работа</h4>
    <h5>Модифицируем предыдущее домашнее задание в соответствии с новыми знаниями:<br><br>

        1. Создайте класс GuestBook, который будет удовлетворять следующим требованиям:<br>
        1) В конструктор передается путь до файла с данными гостевой книги, в нём же происходит чтение данных из ней (используйте защищенное свойство объекта для хранения данных)<br>
        2) Метод getData() возвращает массив записей гостевой книги<br>
        3) Метод append($text) добавляет новую запись к массиву записей<br>
        4) Метод save() сохраняет массив в файл<br>
        2. * Продумайте - какие части функционала можно вынести в базовый (родительский) класс TextFile, а какие - сделать в унаследованном от него классе GuestBook<br>
        3. Создайте класс Uploader в соответствии с требованиями:<br>
        1) В конструктор передается имя поля формы, от которого мы ожидаем загрузку файла<br>
        2) Метод isUploaded() проверяет - был ли загружен файл от данного имени поля<br>
        3) Метод upload() осуществляет перенос файла (если он был загружен!) из временного места в постоянное<br>
        4. * Попробуйте некоторые методы заканчивать конструкцией return $this; и придумайте этому применение<br>
    </h5>
    <h4>Гостевая книга</h4>
    <?php

    $gb = new GuestBook( __DIR__ . '/guestbook1.txt' );

    if ( isset( $_POST['msg'] ) ) {

        $gb->append( $_POST['msg'] )->save(); //Добавляем запись в массив и сохраняем массив с записями в файл
    }
    foreach ( $gb->getData() as $record ) { //Выводим массив с записями

    echo $record; ?>
    <hr>
    <?php } ?>
    <br>
    <h4>Добавление записей в гостевую книгу</h4>
    <form action="/guestbook/index.php" method="post">   <!--4). Форма для добавления новой записи в гостевую книгу-->
        Сообщение: <br><textarea cols="60" rows="10" name="msg"></textarea><br><br>
        <input type="submit" name="submit" value="Добавить">
    </form>
    <br><br>
    <a href="/index.php">Перейти на главную страницу</a>
</body>
</html>