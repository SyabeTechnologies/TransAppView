<?php 
session_start(); 
include('../php/check.php');
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bilan | Journalier</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../css/icon.css" type="text/css" />
  <link rel="stylesheet" href="../css/font.css" type="text/css" />
  <link rel="stylesheet" href="../css/app.css" type="text/css" />  
  <link rel="stylesheet" href="../js/calendar/bootstrap_calendar.css" type="text/css" />

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />
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
    
                </div>
            </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">  
                <center>          
                  <section class="row m-b-md">
                    <div class="col-sm-12">
                      <h3 class="m-b-xs text-black">BILAN DU <?php $date = strtotime($_SESSION['date']); $new_date = date('d-m-Y', $date); echo $new_date;  ?></h3>
                    </div>
                  </section>
                  <div class="row">

    <section class="content">
      <!-- Small boxes (Stat box) -->
    
    <?php
      include('../api.php');

      $bilan['agenceid'] = $_SESSION['agenceid'];
    
      $bilan['date'] = $_SESSION['date'];

      $ApiJSON = json_encode($bilan);

      $url = $connapi."Bilan/selectuv.php?json=" .urlencode($ApiJSON);
      
      $user = curl_init($url);

      curl_setopt($user,CURLOPT_RETURNTRANSFER,true);

      $response = curl_exec($user);
      
      $result = json_decode($response);
    
    ?>

  <br>
  
   
  <table class="table table-striped display" width="100%">
    <thead >
      <tr>
        <th>ACTIVITE</th>
        <th>DEBUT</th>
        <th>FIN</th>
        <th>Apport</th>
        <th>Depot</th>
        <th>Retrait</th>
      </tr>
    </thead >
    <tbody>
    <?php 
                         
                         if($result->data)
                         { 
                           foreach($result->data as $roito) 
                           { 

                             echo "<tr>";
                             echo "<td>" . $roito->Activite . "</td>";
                             echo "<td>" . number_format($roito->UVDebut, 0, ',', ' ') . "</td>";
                             echo "<td> " . number_format($roito->UVFin, 0, ',', ' ') . " </td>";
                             echo "<td> " . number_format($roito->Apport, 0, ',', ' ') . " </td>";
                             echo "<td> " . number_format($roito->Depot, 0, ',', ' ') . " </td>";
                             echo "<td> " . number_format($roito->Retrait, 0, ',', ' ') . " </td>";
                             echo "</tr>";                                                 
                            }
                        }


                        include('../api.php');

                        $bi['agenceid'] = $_SESSION['agenceid'];
                      
                        $bi['date'] = $_SESSION['date'];

                        $ApiJSON = json_encode($bi);

                        $url = $connapi."Bilan/selectcash.php?json=" .urlencode($ApiJSON);
                        
                        $user = curl_init($url);

                        curl_setopt($user,CURLOPT_RETURNTRANSFER,true);

                        $response = curl_exec($user);
                        
                        $result1 = json_decode($response);

                        if($result1->data)
                         { 
                             echo "<tr>";
                             echo "<td>Cash</td>";
                             echo "<td>" . number_format($result1->data->CashDebut, 0, ',', ' ') . "</td>";
                             echo "<td> " . number_format($result1->data->CashFin, 0, ',', ' ') . " </td>";
                             echo "<td> " . number_format($result1->data->Apport, 0, ',', ' ') . " </td>";
                             echo "</tr>";                                                 
                        }
                         
       ?>    
     </tbody>  
  </table>

</center>

    </section>
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