<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration :</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" text="text/css" media="screen" href="successRegis.css" />
    <style type="text/css">
        .wrapper{
            width: 400px;

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
          background-color: rgba(0,0,0,0.5);
        }

        .active {
          background-color: #FFA500;
        }
    </style>
</head>
<body>
    <div>
    <ul>
        <li><a href="index.php">Standings</a></li>
        <li><a class = "active" href="register.php">Registration</a></li>
        <li><a href="HallOfFame.php">Hall Of Fame</a></li>
    </ul>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-15">
 					<h1><font color = "white">Registration Succesfull</h1>
                    
                    
                 		<!--<a href="index.php" class="btn btn-success">Tournament Standings</a>-->
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