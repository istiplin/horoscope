<?php
class Grid{
	private $_data;
	private $_pageCount;
	private $_paginationView;
	private $_viewSummary;
	
	public function __construct(Data $data)
	{
		$this->_data = $data;
		$data->page = $this->correctPage($data->page);
	}

	public function getTitle()
	{
		return $this->_data->title;
	}
	
	private function getCount()
	{
		return $this->_data->getCount();
	}
	
	//выводит информацию о странице
	public function viewSummary()
	{
		if ($this->_viewSummary !== null)
                    return $this->_viewSummary;
                
                if ($this->getCount()==0)
                    return '';   
                
		$beg = ($this->_data->page-1)*$this->_data->pageSize+1;
	
		$end = $this->_data->page*$this->_data->pageSize;
		if ($end>$this->getCount())
			$end=$this->getCount();
			
		return $this->_viewSummary = "Показаны записи из $beg-$end из ".$this->getCount()."<br>";
	}
	
	//выводит нумерацию страниц
	public function viewPagination()
	{
		if ($this->_paginationView !== null)
			return $this->_paginationView;
			
		ob_start();
		$pageCount = $this->getPageCount();
		for($i=1;$i<=$pageCount; $i++){
                    $params = $this->_data->getParams;
                    $params['page']=$i;
                    $getQuery = http_build_query($params);
                    echo "<a href='?$getQuery'>$i</a> ";
		}
		return $this->_paginationView = ob_get_clean();
	}
	
	//выводит список
	public function view()
	{
		$this->_data->view();
	}
	
	//корректирует номер страницы
	private function correctPage($page)
	{
		if ($page===null OR $page<1)
			$page = 1;

		$pages = $this->getPageCount();
		
		if ($page>$pages)
			$page = $pages;
		
		return $page;
	}
	
	//возвращает количество страниц
	private function getPageCount()
	{
		if ($this->_pageCount !== null)
			return $this->_pageCount;
			
		$count = $this->getCount();
		$pages = (int)($count/$this->_data->pageSize);
		if ($count%$this->_data->pageSize>0)
			$pages++;
		return $this->_pageCount = $pages;
	}
}
?>