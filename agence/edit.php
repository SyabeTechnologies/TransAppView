<?php 
session_start();
include('../php/check.php'); ?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transaction | Modifier</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
  <link rel="stylesheet" href="../js/calendar/bootstrap_calendar.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="" >
  <section class="vbox">
    <?php include("../php/header.php"); ?>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">

                <?php include("../php/nav.php"); ?> 

                <?php
   include('../api.php');
   
    $transaction['id'] = $_GET['id'];
  
    $myJSON = json_encode($transaction);

    $url = $connapi."Transaction/selectid.php?json=" .urlencode($myJSON);

  $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($user);
    
    $result = json_decode($response);

	   ?>               
                
              </div>
            </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
               
                  <div class="row">

                    <div class="col-md-4">
                                 
                    </div>
                    <div class="col-md-4">
                        

<!-- Material form subscription -->
<form class="" method="post" action="update.php">
    <br>
    <p class="h4 text-center mb-4">MODIFICATION DE LA TRANSACTION</p>
    <br>
    <!-- Material input text -->

     <div class="md-form ">
        
        <input type="text" id="id" name="id" class="form-control" value="<?php echo $result->data->ID; ?>" required autofocus>
        <label for="materialFormSubscriptionNameEx">ID</label>
    </div>

    <div class="md-form ">
        
        <input type="text" id="montant" name='montant' class="form-control"  value="<?php echo $result->data->Montant; ?>" required autofocus>
        <label for="materialFormSubscriptionNameEx">Montant</label>
    </div>

    <!-- Material input type -->
    <div class="md-form">
        
        <input type="text" id="numero" class="form-control" value="<?php echo $result->data->Numero; ?>" name="numero" required autofocus>
        <label for="materialFormSubscriptionEmailEx">Numero de Telephone</label>
    </div>

    <!-- Material input email -->
      
      <div class="form-group">
      <div class="md-form ">
        
        <input type="text" id="type" name='type' class="form-control"value="<?php echo $result->data->Type; ?>" required autofocus>
        <label for="materialFormSubscriptionNameEx">Type</label>
    </div>
      <!-- Material input email -->
      
      <div class="form-group">
      <div class="md-form ">
        
        <input type="text" id="frais" name='frais' class="form-control"value="<?php echo $result->data->Frais; ?>" required autofocus>
        <label for="materialFormSubscriptionNameEx">Frais</label>
    </div>
      
    <div class="text-center mt-4">
        <button class="btn btn-outline-info" id="submit" name="submit" type="submit">Valider<i class="fa fa-paper-plane-o ml-2"></i></button>
    </div>
    
</form>
<!-- Material form subscription -->
                      
                           
                    </div>
                  </div>
				  
                </section>
              </section>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
  <script src="../js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../js/bootstrap.js"></script>
  <!-- App -->
  <script src="../js/app.js"></script>  
  <script src="../js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="../js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.spline.js"></script>
  <script src="../js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="../js/charts/flot/jquery.flot.resize.js"></script>
  <script src="../js/charts/flot/jquery.flot.grow.js"></script>
  <script src="../js/charts/flot/demo.js"></script>

  <script src="../js/calendar/bootstrap_calendar.js"></script>
  <script src="../js/calendar/demo.js"></script>

  <script src="../js/sortable/jquery.sortable.js"></script>
  <script src="../js/app.plugin.js"></script>
</body>
</html>