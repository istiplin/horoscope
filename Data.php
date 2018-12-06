<?php

abstract class Data {

    protected $_db;
    public $title;
    protected $_count;

    public function __construct() {
        $this->_db = new PDO('mysql:host=127.0.0.1;dbname=horoscope;charset=utf8', 'root', '');
    }

    //возвращает количество записей
    abstract public function getCount();

    //возвращает данные для последующего вывода списка
    abstract protected function getData($limit, $offset);

    //выводит список
    abstract protected function _view($data);

    //выводит список
    final public function view($limit, $offset=0) {
        if ($this->getCount() == 0) {
            echo 'Нет данных!';
            return;
        }
        $data = $this->getData($limit, $offset);
        ob_start();
        $this->_view($data);
        return ob_get_clean();
    }

}

?>