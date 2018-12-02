<?php

class Pagination {

    private $_view;
    private $_viewSummary;
    private $_count;
    private $_getParams;
    private $_pageCount;
    public $page;
    public $pageSize = 20;

    public function __construct($count, $getParams) {
        $this->_count = $count;
        $this->_getParams = $getParams;

        $this->_pageCount = $this->getPageCount();
        $this->page = $this->correctPage($getParams['page']);
    }

    //выводит информацию о странице
    public function viewSummary() {
        if ($this->_viewSummary !== null)
            return $this->_viewSummary;

        if ($this->_count == 0)
            return '';

        $beg = ($this->page - 1) * $this->pageSize + 1;

        $end = $this->page * $this->pageSize;
        if ($end > $this->_count)
            $end = $this->_count;

        return $this->_viewSummary = "Показаны записи из $beg-$end из " . $this->_count . "<br>";
    }

    //выводит нумерацию страниц
    public function view() {
        if ($this->_view !== null)
            return $this->_view;

        ob_start();

        $params = $this->_getParams;
        $pageCount = $this->_pageCount;
        for ($i = 1; $i <= $pageCount; $i++) {
            if ($this->page == $i) {
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
        $pages = (int) ($count / $this->pageSize);
        if ($count % $this->pageSize > 0)
            $pages++;
        return $pages;
    }

}

?>