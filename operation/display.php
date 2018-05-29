<?php 
session_start();
include('../php/check.php'); 
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Operation | Liste</title>
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
                    <?php
                        if (isset($_SESSION['flash'])) 
                        {
                          echo"<div class='alert alert-success'><strong>" .$_SESSION['flash']. "</strong></div>";
                          unset($_SESSION['flash']);
                        }
                    ?>  
                </center>            
                  <section class="row m-b-md">
                    <div>
                      <center><h3 class="m-b-xs text-black">LISTE DES OPERATIONS</h3></center>
                    </div>
                  </section>
                  <div class="row">

    <section class="content">
      <!-- Small boxes (Stat box) -->

      
         
      <?php
   include('../api.php');

    $bil['agenceid'] = $_SESSION['agenceid'];

    $url = $connapi."operation/select.php?json=" .urlencode($ApiJSON);
    
    $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER,true);

    $response = curl_exec($user);
    
    $result = json_decode($response);
     
    
?>

  <div class="table-responsive">
    
                  <table id="myTable" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                         <th>ID</th>
                        <th>UV</th>
                        <th>Cash</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Montant</th>
                        <th>Type</th>
                        <th>Activité</th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php 
                          if($result->data)
                          {  
                            foreach($result->data as $roito) 
                            {
                              if($_SESSION['agenceid']==$roito->AgenceID)
                              { 
                                $date = strtotime($roito->Date); 
                                $new_date = date('d-m-Y', $date);
                              echo "<tr>";
                              echo "<td>" . $roito->ID . "</td>";
                              echo "<td>" . $roito->UV . "</td>";
                              echo "<td>" . $roito->CashMontant . "</td>";
                              echo "<td>" . $new_date . "</td>";
                              echo "<td>" . $roito->Heure . "</td>";
                              echo "<td>" . $roito->Montant . "</td>";
                              echo "<td>" . $roito->Type . "</td>";
                              echo "<td>" . $roito->NomActivite . "</td>";
                              echo "</tr>";      
                              }                         
                            } 
                          } 
                      ?> 
                    </tbody>
                  </table>
                </div>

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

  <!--Js pour le DataTable-->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.16/pagination/input.js"></script>

<!-- Pour le Data table -->
<script type="text/javascript">


$( document ).ready(function() 
{
  $('#myTable').DataTable(
  {

        "scrollX": true,

        dom: 'Bfrtip',

        "order": [[ 0, "desc" ]],

        "pageLength": 5,

        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
});
</script>  
</body>
</html>