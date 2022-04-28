<?php
// Include config file
require_once 'config.php';
header("location: RegisClosed.php");
$Name1 = $InGameName1 = $Name2 = $InGameName2 = $Name3 = $InGameName3 = $Name4 = $InGameName4 = $TeamName = "";
$kills1 = $kills2 = $kills3 = $kills4 = 0;

$Name1_err = $InGameName1_err = $Name2_err = $InGameName2_err = $Name3_err = $InGameName3_err = $Name4_err = $InGameName4_err = $TeamName_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $input_name = trim($_POST["Name1"]);
    if(empty($input_name)){
        $Name1_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["Name1"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $Name1_err = 'Please enter a valid name.';
    } else{
        $Name1 = str_replace(" ","_",$input_name);
    }

    $input_name2 = trim($_POST["Name2"]);
    if(empty($input_name2)){
        $Name2_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["Name2"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $Name2_err = 'Please enter a valid name.';
    } else{
        $Name2 = str_replace(" ","_",$input_name2);
    }

    $input_name3 = trim($_POST["Name3"]);
    if(empty($input_name3)){
        $Name3_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["Name3"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $Name3_err = 'Please enter a valid name.';
    } else{
        $Name3 = str_replace(" ","_",$input_name3);
    }

    $input_name4 = trim($_POST["Name4"]);
    if(!empty($input_name4)){
        if(!filter_var(trim($_POST["Name4"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
            $Name4_err = 'Please enter a valid name.';
        }else
        $Name4 = str_replace(" ","_",$input_name4);
    }

    $team_name = trim($_POST["TeamName"]);
    if(empty($team_name)){
        $TeamName_err = "Please enter a Team name.";
    } elseif(!filter_var(trim($_POST["TeamName"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]{2,16}$/")))){
        $TeamName_err = 'Please enter a valid Team name.(No special characters)';
    } else{
        $TeamName = $team_name;
    }

    $InGame_Name1 = trim($_POST["InGameName1"]);
    if(empty($InGame_Name1)){
        $InGameName1_err = "Please enter your in-game name.";
    }
    else
    $InGameName1 = $InGame_Name1;

    $InGame_Name2 = trim($_POST["InGameName2"]);
    if(empty($InGame_Name2)){
        $InGameName2_err = "Please enter your in-game name.";
    }
    else
        $InGameName2 = $InGame_Name2;

    $InGame_Name3 = trim($_POST["InGameName3"]);
    if(empty($InGame_Name3)){
        $InGameName3_err = "Please enter your in-game name.";
    }
    else
        $InGameName3 = $InGame_Name3;

    $InGame_Name4 = trim($_POST["InGameName4"]);
    if(!empty($InGame_Name4) && !empty($Name4))
        $InGameName4 = $InGame_Name4;



if(empty($Name1_err)&&empty($Name2_err)&&empty($InGameName1_err)&&empty($InGameName2_err)&&empty($Name3_err)&&empty($Name4_err)&&empty($InGameName3_err)&&empty($InGameName4_err)&&empty($TeamName_err))
{

    try{
    $sql = $pdo->prepare("INSERT INTO Teams (TeamName) VALUES (:TeamName)");
    $sql-> bindParam(':TeamName',$TeamName);
    $sql->execute();

    //CREATE TABLE `id8746834_pubg`. ( `Team_ID` INT NOT NULL , `Names` TEXT NOT NULL , `Kills` INT NOT NULL , PRIMARY KEY (`Team_ID`)) ENGINE = InnoDB;

    foreach($pdo->query("SELECT Team_ID FROM Teams WHERE TeamName = '$TeamName'") as $row)
            $Team_ID = $row['Team_ID'];

    $sql2 = "CREATE TABLE `id8746834_pubg`.`$Team_ID` (`Names` TEXT NOT NULL , `InGameNames` TEXT NOT NULL , `Kills` INT NOT NULL DEFAULT 0)";

    $pdo->query($sql2);

    $sqlAddMember = $pdo->prepare("INSERT INTO `id8746834_pubg`.`$Team_ID` (`Names`,`InGameNames`) VALUES (:Name,:InGameName)");

    $sqlAddMember -> bindParam(':Name',$Name1);
    $sqlAddMember -> bindParam(':InGameName',$InGameName1);

    $sqlAddMember->execute();

    $sqlAddMember -> bindParam(':Name',$Name2);
    $sqlAddMember -> bindParam(':InGameName',$InGameName2);

    $sqlAddMember->execute();

    $sqlAddMember -> bindParam(':Name',$Name3);
    $sqlAddMember -> bindParam(':InGameName',$InGameName3);

    $sqlAddMember->execute();

    if(!empty($Name4)){

    $sqlAddMember -> bindParam(':Name',$Name4);
    $sqlAddMember -> bindParam(':InGameName',$InGameName4);

    $sqlAddMember->execute();
    }
    }
    catch(PDOException $e)
    {
        ?>
        <h1> Yikes !!! Something Went Wrong. Please Contact Developers (Any admin from group)</h1>
        <?php
        exit();
        //header("location: error.php");
    }
    //$sql4 = "INSERT INTO `id8746834_pubg`.`$Team_ID` (`Names`,`InGameNames`) VALUES ('$Name2','$InGameName2')";

    //$pdo->query($sql3);
    //$pdo->query($sql4);
    //echo "no no no";
    unset($pdo);
    header("location: successfulRegistration.php");
    exit();
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration :</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" text="text/css" media="screen" href="regis.css" />
    <style type="text/css">
        .wrapper{
            width: 300px;

            margin: auto auto;
        }
        ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
          overflow: hidden;
          background-color: rgba(0,0,0,0.5);
        }

        li {
          float: left;
        }

        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 8px 16px;
          text-decoration: none;
        }

        li a:hover:not(.active) {
          background-color: #111;
        }

        .active {
          background-color: #FFA500;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="index.php">Standings</a></li>
        <li><a class = "active" href="register.php">Registration</a></li>
        <li><a href="HallOfFame.php">Hall Of Fame</a></li>
    </ul>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-15">
                    <div class="page-header">
                        <h2><font color = "white">Squad Registration :</h2>
                    </div>
                     <p>Please fill this form to register for the tournament.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                    	<div class="form-group <?php echo (!empty($TeamName_err)) ? 'has-error' : ''; ?>">
                            <label>Team Name (max 15 characters)</label>
                            <input type="text" name= "TeamName" class="form-control" value="<?php echo $TeamName; ?>">
                            <span class="help-block"><?php echo $TeamName_err;?></span>
                        </div>


                    	<div class="form-group <?php echo (!empty($Name1_err)) ? 'has-error' : ''; ?>">
                            <label><font color = "#FF8C00">Player 1 Real Name</label>
                            <input type="text" name= "Name1" class="form-control" value="<?php echo $Name1; ?>">
                            <span class="help-block"><?php echo $Name1_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($InGameName1_err)) ? 'has-error' : ''; ?>">
                            <label>Player 1 In-Game Name</label>
                            <input type="text" name="InGameName1" class="form-control" value="<?php echo $InGameName1; ?>">
                            <span class="help-block"><?php echo $InGameName1_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($Name1_err)) ? 'has-error' : ''; ?>">
                            <label>Player 2 Real Name</label>
                            <input type="text" name= "Name2" class="form-control" value="<?php echo $Name2; ?>">
                            <span class="help-block"><?php echo $Name2_err;?></span>
                        </div>


                        <div class="form-group <?php echo (!empty($InGameName2_err)) ? 'has-error' : ''; ?>">
                            <label>Player 2 In-Game Name</label>
                            <input type="text" name="InGameName2" class="form-control" value="<?php echo $InGameName2; ?>">
                            <span class="help-block"><?php echo $InGameName2_err;?></span>
                        </div>


                         <div class="form-group <?php echo (!empty($Name3_err)) ? 'has-error' : ''; ?>">
                            <label>Player 3 Real Name</label>
                            <input type="text" name= "Name3" class="form-control" value="<?php echo $Name3; ?>">
                            <span class="help-block"><?php echo $Name3_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($InGameName3_err)) ? 'has-error' : ''; ?>">
                            <label>Player 3 In-Game Name</label>
                            <input type="text" name="InGameName3" class="form-control" value="<?php echo $InGameName3; ?>">
                            <span class="help-block"><?php echo $InGameName3_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($Name4_err)) ? 'has-error' : ''; ?>">
                            <label>Player 4 Real Name</label>
                            <input type="text" name= "Name4" class="form-control" value="<?php echo $Name4; ?>">
                            <span class="help-block"><?php echo $Name4_err;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($InGameName4_err)) ? 'has-error' : ''; ?>">
                            <label>Player 4 In-Game Name</label>
                            <input type="text" name="InGameName4" class="form-control" value="<?php echo $InGameName4; ?>">
                            <span class="help-block"><?php echo $InGameName4_err;?></span>
                        </div>


                        <br>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                        <br><br><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    window.onload = () => {
    let el = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
    el.parentNode.removeChild(el);
}
</script>
</body>
</html>