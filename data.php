<?php
    $name_arr = array();
	require_once "config.php";
	 $pass = "iamtheadmin";
    $Passkey = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Passkey = trim($_POST["Password"]);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body{
            background-color: rgba(0,0,0,0.5);
            color: aliceblue;
        }
        h2{
            text-align:center;
            font-size:30px;
            font-weight:900;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<script>
    </script>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label>Password</label>
                        <input type="text" name= "Password" value ="<?php echo $Passkey; ?>" "class="form-control" >
                        <br>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <br><br>
                    </form>
                     <?php
                        if($pass == $Passkey && !empty($Passkey)){

                    ?>
                        
                        <h2 class="pull-left">Member List</h2>
                    </div>
                    <?php         
                    // Attempt select query execution
                    $sql = "SELECT * FROM Teams";
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
                            echo "<table class='table table-responsive table-dark table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>TeamID</th>";
                                        echo "<th>TeamName</th>";
                                        echo "<th>Player 1 kills</th>";
                                        echo "<th></th>";
                                        echo "<th>Player 2 kills</th>";
                                        echo "<th></th>";
                                        echo "<th>Team Rank</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['Team_ID'] . "</td>";
                                        echo "<td>" . $row['TeamName'] . "</td>";
                                        $name = $row['Team_ID'];
                                        $sql1 = "select * from `id8746834_pubg`.`$name`";
                                        $pdo->quote($sql1);
                                        $result1 = $pdo->query($sql1);
                                        $i=1;
                                        while($r = $result1->fetch()){ 
                                            $name = $r['InGameNames'];
                                            $pName = $r['Names'];
                                            ?>
                                            <form target="_blank" action ="add.php" method="GET">
                                            <div id="main_nav<?php echo $i ?>">
                                                <td><input type="text" name="<?php echo $pName?>"placeholder= "<?php echo htmlspecialchars($name)?>">
                                                </td>
                                            </div>
                                        <?php 
                                        }
                                        ?>
                                            <td><input type="text" STYLE="color: #FFFFFF; font-family: Verdana; font-weight: bold; font-size: 12px; background-color: #72A4D2;" name="Position"></td>
                                            <input type="hidden" name="TeamName" value="<?php echo $row['TeamName'] ?>">
                                            <input type="hidden" name="Team_ID" value="<?php echo $row['Team_ID'] ?>">
                                            <td><input class="btn btn-success" type="submit" name="sub" value="Update"></td>
                                            </form>
                                <?php 
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    }else{
                        echo "ERROR: Not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    unset($pdo);
                    ?>
                    
                    <br><br>
                </div>
            </div>        
        </div>
    </div>


    <!--    ks-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<?php 
}
?>
</html>