<?php 
session_start();
include('../php/check.php'); ?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Activités | Liste</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />

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
                
              </div>
            </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
                  <section class="row m-b-md">
                    

                     <center>
          <?php
          if (isset($_SESSION['flash'])) {
                 echo"<div class='alert alert-success'><strong>" .$_SESSION['flash']. "</strong></div>";
                 unset($_SESSION['flash']);
              }
              
            ?>  
        </center> 
                  </section>
                  <div class="row">

                    <section class="content">
      <!-- Small boxes (Stat box) -->
    
        <?php
      include('../api.php');

    $url = $connapi."Activite/select.php?";
    
    $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER,true);

    $response = curl_exec($user);
    
    $result = json_decode($response);
    
?>
                <p class="h4 text-center mb-4">ACTIVITES</p>
                <br>
                              
                 <div class="table-responsive">
                  <table id="myTable" class="display nowrap" cellspacing="0" width="100%" >
                    <thead>
                      <tr>
                        <th data-column-id="id" data-type="numeric">ID</th>
                        <th data-column-id="id" data-type="numeric">Libelle</th>
                        <th data-column-id="id" data-type="numeric">Action</th>
                     
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
                                
                              echo "<tr>";
                              echo "<td>" . $roito->ID . "</td>";
                              echo "<td>" . $roito->Libelle . "</td>";
                              echo '<td><div class="btn-group btn-group-md">'
                          ?>
                              <a href="edit.php?id='<?php echo $roito->ID ?>'" type="button" class="btn btn-warning">Modifier</a>
                            <?php
                              echo "</tr>";                              
                                    }
        
                                }
                        
                              }  
                        ?> 
                    </tbody>
                  </table>
                </div>
    

<!-- Material form subscription -->
                      
                           
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


<script type="text/javascript">
$( document ).ready(function() 
{
  $('#myTable').DataTable(
  {
        "scrollX": true,

        dom: 'Bfrtip',

        "pageLength": 5,

        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
});
</script>
</body>
</html>