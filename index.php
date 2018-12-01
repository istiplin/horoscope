<?php
	require_once 'Grid.php';
	require_once 'CapricornData.php';
	require_once 'PredictionData.php';
        
        $type = 'Capricorn';
        if (isset($_GET['type']))
            $type = $_GET['type'];
            
        if ($type == 'Capricorn'){
            $grid = new Grid(new CapricornData($_GET));
        }
        elseif ($type == 'Prediction'){
            $grid = new Grid(new PredictionData($_GET));
        }
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h3>Гороскоп</h3>
<ul>
    <li><a href='?type=Capricorn'>Список пользователей со знаком зодиака «козерог»</a></li>
    <li>Прогнозы для знака зодиака «козерог»
        <ul>
            <li><a href='?type=Prediction&interval=nextMonth'>на следующий месяц</a></li>
            <li><a href='?type=Prediction&interval=currWeek'>на текущую неделю</a></li>
            <li><a href='?type=Prediction&interval=yesterday'>на вчерашний день</a></li>
        </ul>
    </li>
</ul>
<?php 
	echo $grid->getTitle();
	echo $grid->viewSummary();
	echo $grid->viewPagination();
	$grid->view();
	echo $grid->viewPagination();
?>
</body>
</html>