<?php

require_once 'Data.php';

class CapricornData extends Data {

    //private $_begDate = '01-09';
    //private $_endDate = '02-15';

    private $_begDate = '12-22';  //начало даты знака «козерог»
    private $_endDate = '01-19'; //конец даты знака «козерог»

    public function __construct() {
        parent::__construct();
        $this->title = '<h4>Список пользователей со знаком зодиака «козерог»: </h4>';
    }

    //возвращает количество записей
    public function getCount() {
        if ($this->_count !== null)
            return $this->_count;

        $sql = "select 
                        count(*)
                    from user u
                    join user_field_value ufv on ufv.i_user_id = u.i_id
                    where ufv.i_fld_id=1
                    and beetween_date(ufv.t_value,'{$this->_begDate}','{$this->_endDate}')";
        return $this->_count = $this->_db->query($sql)->fetchColumn();
    }

    //возвращает данные о пользователях со знаком зодиака «козерог».
    protected function getData($page, $pageSize) {
        $sql = "select 
                    u.i_id,
                    u.s_login,
                    ufv.t_value
                from user u
                join user_field_value ufv on ufv.i_user_id = u.i_id
                where ufv.i_fld_id=1
                and beetween_date(ufv.t_value,'{$this->_begDate}','{$this->_endDate}')
                order by RIGHT(t_value,5)
                limit " . (($page - 1) * $pageSize) . ",{$pageSize}";

        return $this->_db->query($sql);
    }

    //выводит список
    protected function _view($data) {
        echo '<table>
<tr>
<th>ИД</th>
<th>Логин</th>
<th>Дата рождения</th>
</tr>';
        foreach ($data as $row) {
            echo "<tr>
<td>{$row['i_id']}</td>
<td>{$row['s_login']}</td>
<td>{$row['t_value']}</td>
</tr>";
        }
        echo '</table>';
    }

}

?>