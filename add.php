<?php
    $name_arr = array();
	require_once "config.php";

    function get_points($pos,$kills)
    {
        $points=0;
        if($pos==1)
            $points += 100;
        else if($pos == 2)
            $points += 80;
        else if($pos == 3)
            $points += 60;
        else if($pos == 4)
            $points += 40;
        else if($pos == 5)
            $points += 20;
        $points += ($kills)*10;
        return $points;
    }

    if(isset($_GET)){
        $l = array_keys($_GET);
        $totalKills = 0;
        foreach ($l as $g) {
            if($g != 'sub' && $g!='Position' && $g != 'TeamName' && $g !='Team_ID'){
                $tID = $_GET['Team_ID'];
                $tName = $_GET['TeamName'];
                $kill = $_GET[$g];
                $pName = $g;
                $totalKills += $kill;
                $sqlo = "UPDATE `id8746834_pubg`.`$tID` SET Kills = Kills + $kill where Names = '$pName'";
                $pdo->query($sqlo);
                echo $g;
            }
            
        }
        $points = get_points($_GET['Position'],$totalKills);
        $tn = $_GET['TeamName'];
        $sql2 = "UPDATE Teams set points = points + $points where TeamName = '$tn'";
        $pdo -> query($sql2);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<script type='text/javascript'>
    self.close();
</script>    
</body>
</html>
