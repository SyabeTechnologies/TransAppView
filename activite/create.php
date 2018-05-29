<?php
   ob_start();
   session_start();
   include('../api.php');
   include('../php/check.php');
   if(isset($_POST['submit']))
   {
    $activite['libelle'] = $_POST['libelle'];
    $activite['agenceid']=$_SESSION['agenceid'];
   
    $ApiJSON = json_encode($activite);

    $url = $connapi."Activite/create.php?json=" .urlencode($ApiJSON);

  $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($user);
    
    $result = json_decode($response);

    if($result->status==1)
    {
      $_SESSION['flash']="Activité ajouté";

      echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

    }
    else
    {
      $_SESSION['flash']= $result->message; 

      echo "<script type='text/javascript'>location.href = 'add.php';</script>";

    }
	
   
   } 

   ob_end_flush();
?>