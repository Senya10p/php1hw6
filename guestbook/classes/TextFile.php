<?php

class TextFile      //2. Выносим часть функционала в родительский класс TextFile
{
    protected $data;    //защищённое свойство для хранения данных
    public $way;

    /*1.1 В конструктор передается путь до файла с данными гостевой книги,
    в нём же происходит чтение данных из ней (используйте защищенное свойство объекта для хранения данных)*/
    public function __construct( $way )
    {
        $this->way = $way;

        if ( is_readable($this->way) ){
            $lines = file( $this->way, FILE_IGNORE_NEW_LINES );
            $this->data = $lines;
        }

        $this->data =[];
    }


    public function getData() //1.2 Метод getData() возвращает массив записей гостевой книги
    {
        return $this->data;
    }


    public function save() //1.4 Метод save() сохраняет массив в файл
    {
        file_put_contents( $this->way, implode( PHP_EOL, $this->data ) );
    }
}