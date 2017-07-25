<?php
  include('db.php');
  $agent =  $_SERVER['HTTP_USER_AGENT'];
  if (strpos($agent, "sqlmap") !== false) {
    exit();
  }
  $found = false;
  if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $query = "SELECT * FROM destination WHERE destination LIKE '%$search_query%';";

    $result = mysqli_query($db, $query);

    if (!$result) {
      echo "Query Error: " . $query;
    } else {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      if ($count) {
        $found = true;
        $destination = $row['destination'];
        $facilities = $row['facilities'];
        $tourism_place = $row['tourism_place'];
        $price = substr($row['price'], 3);
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>Travel & Beyond Co. | Discover the Wonderful World</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>



    <div class="container ptb">
      <div class="row centered">

        <?php
          if ($found) {

        ?>

        <h2 class="mb">Destinasi Ditemukan</h2>

        <div class="col-md-4">
        </div>

        <div class="col-md-4">
          <div class="price-table">
              <div class="p-head">
                <?php echo $destination; ?>
              </div>
              <div class="p-body">
                <ul class="features">
                  <li><?php echo $facilities; ?></li>
                  <li><?php echo $tourism_place; ?></li>
                </ul>
                <div class="price">
                  <span class="sub">Rp</span>
                  <span class="detail"><?php echo $price; ?></span>
                </div><!--/price-->
                <button class="btn btn-conf-2 btn-green">Pesan</button>
              </div><!--/p-body-->
          </div><!--/price-table-->
        </div><!--/col-md-4-->

        <?php
          } else {
            echo '<h2 class="mb">Destinasi Tidak Ditemukan</h2></br></br></br></br></br></br>';
          }
        ?>

      </div><!--/row-->
    </div><!--/container-->
  
    <div id="f">
      <div class="container">
        <div class="row centered">
          <h2>Contact Us for Any Problem</h2>
          <h5>HELLO@TRAVELBEYO.ND</h5>

          <h6 class="mt">COPYRIGHT 2016 - Travel & Beyond Co.</h6>
        </div><!--/row-->
      </div><!--/container-->
    </div><!--/F-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/retina-1.1.0.js"></script>
  </body>
</html>
