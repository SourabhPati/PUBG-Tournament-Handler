<!DOCTYPE html>
<html>
<head>

<iframe src="HallOfFameBg.mp3" allow="autoplay" style="display:none" id="iframeAudio">
</iframe> 
<audio autoplay loop  id="playAudio">
      <source src="audio/source.mp3">
    </audio>
</audio>

	<title>Hall of Fame</title>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Standings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" text="text/css" media="screen" href="HOF.css" />
    <style>
h1{
    padding-left:10px;
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
.dark{
    background-color: rgba(60,60,60,0.8);
    border-radius: 9px;
	
}
.accent{
  background-color:  rgba(192,192,192,0.3);
  border-radius: 9px;
  color:white;

}
html, body {min-height: 100%;}

</style>
</head>
<body>
  
	<ul>
        <li><a href="index.php">Standings</a></li>
        <li><a href="register.php">Registration</a></li>
        <li><a class="active" href="HallOfFame.php">Hall Of Fame</a></li>
    </ul>
    <section>
    	<div class="row">
  <div class="col-sm-6">
    	<div class="card mt-3 ml-2 mr-2 mb-3 dark">

    		<div class="card-header">
    <h4><font color = white>TOURNAMENT 1 WINNERS</font><h4>
  </div>
  
  <div class="card-body">
    <h5 class="card-title "><font color = white><strong>RUSH</font></strong></h5>
   <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    <ul class="list-group list-group-flush">
    <li class="list-group-item accent">RÛSH๛Am0x</li>
    <li class="list-group-item accent">RÛSH๛乃HタI</li>
  </ul>
  </div>
</div>
</div>
</div>


	<div class="row">
  <div class="col-sm-6">
    	<div class="card mt-3 ml-2 mr-2 mb-3 dark">

    		<div class="card-header">
    <h4><font color = white>TOURNAMENT 2 WINNERS</font><h4>
  </div>
  
  <div class="card-body">
    <h5 class="card-title "><font color = white><strong>Baazigar B</font></strong></h5>
   <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
    <ul class="list-group list-group-flush">
    <li class="list-group-item accent">BZR々Almighty</li>
    <li class="list-group-item accent">BZR々BaliStorm</li>
    <li class="list-group-item accent">BZR々Krishna</li>
    <li class="list-group-item accent">Impratikraj</li>
  </ul>
  </div>
</div>
</div>
</div>
    </section>
	<script>
	 window.onload = () => {
    let el = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
    el.parentNode.removeChild(el);
}
    var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
    if(!isChrome){
      $('#iframeAudio').remove()
    }
  else{
     $('#playAudio').remove() //just to make sure that it will not have 2x audio in the background 
  }
 
  </script>
</body>
</html>