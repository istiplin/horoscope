<?php
require_once 'Data.php';
class PredictionData extends Data{

	private $_intervalFilters=[
		'nextMonth' => 'MONTH(d_date) = MONTH(DATE_ADD(NOW(), INTERVAL 1 MONTH))',
		'currWeek'=>'WEEK(d_date, 1) = WEEK(NOW(), 1)',
		'yesterday'=>'DATE(d_date) = DATE(NOW() - INTERVAL 1 DAY)'
	];
	
	private $_intervalNames=[
		'nextMonth' => 'на следующий месяц',
		'currWeek'=>'на текущую неделю',
		'yesterday'=>'на вчерашний день'
	];
	
	private $_intervalKey = 'nextMonth';

	public function __construct($params)
	{
		parent::__construct($params);
		
		if ($params['interval']!==null)
			$this->_intervalKey = $params['interval'];
		
		$name = $this->_intervalNames[$this->_intervalKey];
		$this->title = "<h4>Прогнозы для знака зодиака «козерог» $name: </h4>";
	}

	//возвращает количество записей
	public function getCount()
	{
		if ($this->_count !== null)
			return $this->_count;
	
		$filter = $this->_intervalFilters[$this->_intervalKey];
	
		$sql = "select 
					count(*)
				from prediction
				where i_zodiac_id=1
				and $filter";
		return $this->_count = $this->_db->query($sql)->fetchColumn();
	}

	//возвращает данные о предсказаниях
	protected function getData()
	{
		if ($this->_data !== null)
			return $this->_data;
		
		$filter = $this->_intervalFilters[$this->_intervalKey];
		
		$sql = "select
					d_date,
					t_text
				from prediction
				where i_zodiac_id=1
				and $filter
				limit ".(($this->page-1)*$this->pageSize).",{$this->pageSize}";

		return $this->_data = $this->_db->query($sql);
	}
	
	//выводит список
	protected function _view()
	{
		echo '<table>
<tr>
<th>Дата</th>
<th>Предсказание</th>
</tr>';
		$res = $this->getData();
		foreach($res as $row){
			echo "<tr>
<td>{$row['d_date']}</td>
<td>{$row['t_text']}</td>
</tr>";
		}
		echo '</table>';
	}
}
?>