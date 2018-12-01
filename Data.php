<?php
abstract class Data{
	public $page;
	public $pageSize = 20;
	public $title;
	public $getParams;
        
	protected $_db;
	
	private $_count;
	private $_data;
	
	public function __construct($params)
	{
		$this->_db = new PDO('mysql:host=127.0.0.1;dbname=horoscope;charset=utf8', 'root', '');
		$this->page = $params['page'];
                $this->getParams = $params;
	}
	
	//возвращает количество записей
	abstract public function getCount();
	
	//возвращает данные для последующего вывода списка
	abstract protected function getData();
	
        //выводит список
        abstract protected function _view();
        
	//выводит список
	final public function view(){
            if ($this->getCount()==0)
            {
                echo 'Нет данных!';
                return;
            }
            
            $this->_view();
        }
}
?>