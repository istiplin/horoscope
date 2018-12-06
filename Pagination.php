<?php
class Pagination {

    private $_view;
    private $_viewSummary;
    private $_count;
    private $_getParams;
    private $_pageCount;
    private $_page;
    private $_offset;
    private $_pageSize;

    public function __construct($count, $getParams, $pageSize = 20) {
        $this->_count = $count;
        $this->_getParams = $getParams;
        $this->_pageSize = $pageSize;
        $this->_pageCount = $this->getPageCount();
        $this->_page = $this->correctPage($getParams['page']);
    }

    public function getOffset()
    {
        if ($this->_offset !== null)
            return $this->_offset;
        
        return $this->_offset = ($this->_page - 1) * $this->_pageSize;
    }
    
    public function getPageSize()
    {
        return $this->_pageSize;
    }
    
    //выводит информацию о странице
    public function viewSummary() {
        if ($this->_viewSummary !== null)
            return $this->_viewSummary;

        if ($this->_count == 0)
            return false;

        $beg = $this->getOffset() + 1;

        $end = $this->_page * $this->_pageSize;
        if ($end > $this->_count)
            $end = $this->_count;

        return $this->_viewSummary = "Показаны записи из $beg-$end из " . $this->_count . "<br>";
    }

    //выводит нумерацию страниц
    public function view() {
        if ($this->_view !== null)
            return $this->_view;

        if ($this->_pageCount < 2)
            return false;
        
        ob_start();

        $params = $this->_getParams;
        for ($i = 1; $i <= $this->_pageCount; $i++) {
            if ($this->_page == $i) {
                echo $i . " ";
            } else {
                $params['page'] = $i;
                $getQuery = http_build_query($params);
                echo "<a href='?$getQuery'>$i</a> ";
            }
        }
        return $this->_view = ob_get_clean();
    }

    //корректирует номер страницы
    private function correctPage($page) {
        if ($page != null AND !is_numeric($page))
            throw new Exception('Page is not integer');

        if ($page == null OR $page < 1)
            $page = 1;

        $pages = $this->_pageCount;

        if ($page > $pages)
            $page = $pages;

        return $page;
    }

    //возвращает количество страниц
    private function getPageCount() {
        $count = $this->_count;
        $pages = (int) ($count / $this->_pageSize);
        if ($count % $this->_pageSize > 0)
            $pages++;
        return $pages;
    }
    
    public function getPage(){
        return $this->_page;
    }

}

?>