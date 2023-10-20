<?php
// Контейнер и bootstrap.php работают сообща.
// Основная работа проходит в bootstrap.
// Здесь как бы шаблон этой работы.

namespace Core;

class Container
{
    // массив
    protected $bindings = [];

    // вызывая этот метод, заполняется массив;
    // ключом является пространство имён,
    // значением является функция, запускающая подключение к БД
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    // Но чтобы запустить подключение к БД,
    // вызывается этот метод.
    // Он убеждается, что такой ключ (пространство имён)
    //  уже есть в массиве, иначе - Исключение;
    // Получает всю функцию подключения по ключу в переменную;
    // И мы возвращаем работу этой функции подключения
    // с помощью call_user_func.
    public function resolve($key)
    {
        if(!array_key_exists($key, $this->bindings)) {
            throw new \Exception('No matching binding found for '.$key);
        }
        
        // можно использовать, и можно удалить это условие
        //if(array_key_exists($key, $this->bindings)) { 
            $resolver = $this->bindings[$key];
            
            return call_user_func($resolver);
        //}
    }
}