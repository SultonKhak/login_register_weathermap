<?php
session_start();

//connect to database
$db=mysqli_connect("localhost","root","","mysite");
$api='https://api.openweathermap.org/data/2.5/onecall?lat=-6.2146&lon=106.8451&exclude=hourly&appid=9e3c5085d95648026083f1649a21ec1e';
$getAPi=file_get_contents($api);
$data=json_decode($getAPi, true);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Weather Information</title>
  </head>
  <body>
    


    <!-- <nav class="navbar navbar-inverse">
      <div class="container-fluid">
       Collect the nav links, forms, and other content for toggling -->
        <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav center">
            <li><a href="login.php">LogIN</a></li>
            <li><a href="register.php">SignUp</a></li>
            <li><a href="logout.php">LogOut</a></li>
          </ul>

        </div>
      </div>
    </nav> --> 
    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="login.php">LogIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="register.php">SignUp</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="logout.php">LogOut</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <br>


    <main class="main-content">
    <div class="col-md-6 col-md-offset-4">
    <h3>Weather Home</h3>
    <div>
        <h5>Welcome <?php echo $_SESSION['username']; ?></h5>
    </div>

    <!-- <form action="" method="post">
      <div class="row">
        <label>City Name</label>
        <input type="text" name="city" value="<?=isset($_POST['city']) ? $_POST['city'] : ''?>"/>
      </div>
      <div class="row">
        <input type="submit" name="submit" value="Submit"/>
      </div>
    </form>

    <?php
    // echo $_GET['city'];
    // $citySelect = $_POST['city'];
    // echo $citySelect;
    // $apiFirst = 'https://api.openweathermap.org/data/2.5/weather?q='+$citySelect+'&appid={9e3c5085d95648026083f1649a21ec1e}';
    // $getAPifirst=file_get_contents($apiFirst);
    // $datafirst=json_decode($getAPifirst, true);
    // echo $apiFirst;
    // $nameCity = $datafirst['name'];
    // $lon = $datafirst['coord']['lon'];
    // $lat = $datafirst['coord']['lat'];
    // $api='https://api.openweathermap.org/data/2.5/onecall?lat='+ $lat +'&lon='+ $lon +'&exclude=hourly&appid=9e3c5085d95648026083f1649a21ec1e';
    // $getAPi=file_get_contents($api);
    // $data=json_decode($getAPi, true);
    // var_dump($data);
    ?> -->

    <br><h4>City : Jakarta</h4>

    <div class="container">
      <div class="row">
        <?php $i=1;?>
        <?php foreach($data['daily'] as $row){
          
        ?>
        
        <div class="col-3 col-sm-5">
          <div class="card shadow-lg" style="width: 20rem;">
          <?php
          if ($i == 1) {
          ?>
            <h5><?php echo "Day " . $i . " (Today)";?></h5>
            <h5><?php echo "Morning : " . $row['temp']['day'] - 273.15 . "°C"?></h5>
            <h5><?php echo "Night : " . $row['temp']['night'] - 273.15 . "°C"?></h5>
          <?php } elseif($i == 2) {
          ?>
            <h5><?php echo "Day " . $i . " (Tomorrow)";?></h5>
            <h5><?php echo "Morning : " . $row['temp']['day'] - 273.15 . "°C"?></h5>
            <h5><?php echo "Night : " . $row['temp']['night'] - 273.15 . "°C"?></h5>
          <?php } else{?>
            <h5><?php echo "Day " . $i . "<br>";?></h5>
            <h5><?php echo "Morning : " . $row['temp']['day'] - 273.15 . "°C"?></h5>
            <h5><?php echo "Night : " . $row['temp']['night'] - 273.15 . "°C"?></h5>
          <?php }?>
            <br>
          </div>
        </div>
        
        <?php $i++;}?>
      </div>
    </div>
    <br>      
    <a href="logout.php">Log Out</a>
    </div>
    </main>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
