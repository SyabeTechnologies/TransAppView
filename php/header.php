
<?php
   ob_start();
//appelle du cash
   include('../api.php');

   $cash['date'] = date("Y-m-d");

   $cash['agenceid'] = $_SESSION['agenceid'];

   $ApiJSON=json_encode($cash);

   $url = $connapi."Cash/select.php?json=" .urlencode($ApiJSON);

    
   $user = curl_init($url);

   curl_setopt($user,CURLOPT_RETURNTRANSFER,true);

   $response = curl_exec($user);
    
   $result = json_decode($response);

   if($result->data)
   {
      $req = $result->data->Montant;
   }

   
?>

<?php
//appelle du UV
   include('../api.php');

   $cash['date'] = date("Y-m-d");

   $cash['agenceid'] = $_SESSION['agenceid'];

   $ApiJSON=json_encode($cash);

    $url = $connapi."Header/select.php?json=" .urlencode($ApiJSON);
    
    
    $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER,true);

    $response = curl_exec($user);
    
    $result = json_decode($response);

  
?>

  <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="../home/dashboard.php" class="navbar-brand">
          <span class="hidden-nav-xs">TransApp</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <!--Affichage de le cash-->
      <ul class="nav navbar-nav navbar-left m-n hidden-xs nav-user user" style="Background-color:#3CB371; font-style:italic; font-size:13px;">
        <li class="dropdown">
          <a href="#" >
            <span >
              Cash : <?php if($req){ echo number_format($req, 0, ',', ' ') . " FCFA";} else { echo "Vide";} ?> 
            </span>
          </a>
        </li>
      </ul>


      <?php
       if(isset($result->data))
       {
        foreach ($result->data as $toto)
        {
      ?>

        <ul class="nav navbar-nav navbar-left m-n hidden-xs nav-user user" style="Background-color:#FFFFE0; font-style:italic; font-size:13px;">
        <li class="dropdown">
          <a href="#" >
            <span >
              <?php echo $toto->Activite->Libelle ?> : <?php if($toto->UV==true){ echo number_format($toto->UV->UV, 0, ',', ' ') . " FCFA"; } else { echo "Vide";} ?> 
            </span>
          </a>
        </li>
      </ul>

      <?php
        }
        
      }
      ?>


      <!--Affichage de l'utilisateur-->
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span>
              <?php echo $_SESSION['nomagence']; ?> <b class="caret"></b>
            </span>
          </a>
          <ul class="dropdown-menu animated fadeInRight"> 
            <li>
              <a href="../logout.php" onclick="return confirm('Voulez-vous vraiment vous déconnectez ?')" >Se déconnecter</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>

    <?php
        ob_end_flush();
    ?>