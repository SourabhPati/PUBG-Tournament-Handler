<?php
/*	try {
		require "./config.php";
		$connection = new PDO($dsn, $username, $password, $options);
        // fetch data code will go here
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}*/
	require_once "config.php";

    $HighestKiller="No Highest kills yet";
    $maxKills = 0;

$sql = "SELECT * FROM Teams";
if($result = $pdo->query($sql)){
    if($result->rowCount() > 0){
        while($row = $result->fetch()){
            $name = $row['Team_ID'];
            $sql1 = "select * from `id8746834_pubg`.`$name`";
            $result1 = $pdo->query($sql1);
            $i=1;
            while($r = $result1->fetch()){ 
                $name = $r['InGameNames'];
                $kills = $r['Kills'];
                if($kills > $maxKills){
                    $maxKills = $kills;
                    $HighestKiller = "TERMINATOR : ".$name."  --  ".$kills." kills";
                }
            }
        }
        unset($result);
    } else{
    }
}else{
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Standings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" text="text/css" media="screen" href="index.css" />
    <script src="main.js"></script>
    <style>
.marquee {
  padding: 10px 0;
  font-family: "Helvetica", sans-serif;
  font-size: 18px;
  font-weight: 600;
  line-height: 18px;
  color: #fff;
  text-transform: uppercase;
  background: rgba(0,0,0,0.7);
  white-space: nowrap;
  overflow: hidden;
}
.marquee .marquee-container {
  display: inline-block;
  will-change: transform;
}
.marquee span {
  padding-left: 70px;
}
.marquee span:after {
  content: "            ";
  margin-left: 70px;
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
  padding: 8px 14px;
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
<body class="dark">
    <ul>
        <li><a class="active" href="index.php">Standings</a></li>
        <li><a href="register.php">Registration</a></li>
        <li><a href="HallOfFame.php">Hall Of Fame</a></li>
    </ul>
    <section class="marquee-component">
        <div class="marquee">
            <div class="marquee-container"></div>
        </div>
    </section>
    <h2>Tournament Standings</h2>
    <div class="line"></div>
    <div class="container">
        <div class="h-100 row align-items-center">

        <?php
            $sql = "SELECT * FROM Teams order by points DESC";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll();
            if ($result && $statement->rowCount() > 0) { ?> 
                <div class="table-responsive">
                    <table class="mt-2 table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Team</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                $i=1;
                foreach ($result as $row) { ?>
                     <tr>
                        <td><?php echo $i++ ?></td>
                        <td>
                            <div><?php echo $row["TeamName"] ?></div>
                        </td>
                        <td><?php echo $row["Points"] ?></td>
                    </tr>
                <?php
                } ?>
                        </tbody>
                        </table>
                    </div>
        <?php
            } else 	{ ?>
                <div class="col-md-12 mt-2">
                    <h2 > Sorry no results yet!</p>
                </div>
                
            <?php } 
        ?>
    </div>
    </div>





<!--    ks-->
<script>
    window.onload = () => {
    let el = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
    el.parentNode.removeChild(el);
}
const wrapper = document.querySelector('.marquee');
const container = document.querySelector('.marquee-container');

let offset = 0;
let threshold;

let message = '<?php echo addslashes($HighestKiller); ?>';

const setup = () => {
  message = `<span>${message}</span>`
  container.innerHTML = message;
    
  threshold = container.getBoundingClientRect().width;

  window.requestAnimationFrame(() => {
    setMessage();
    step();
  });
};

const setMessage = () => {  
  const repeat = Math.ceil(wrapper.getBoundingClientRect().width / threshold);
  container.innerHTML += message.repeat(repeat);
};

const step = () => {
  offset += 0.5;

  if (offset >= threshold) {
    offset = 0;
  }

  const transform = `translateX(${-offset}px)`;
  container.style.msTransform = transform;
  container.style.webkitTransform = transform;
  container.style.MozTransform = transform;
  container.style.OTransform = transform;
  container.style.transform = transform;

  window.requestAnimationFrame(step);
};

window.addEventListener('resize', setMessage);
setup();

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
