<?php
ob_start();
 session_start();
 include('../php/check.php');
   include('../api.php');
  
   
    $activite['id'] = $_GET['id'];

    $ApiJSON = json_encode($activite);

    $url = $connapi."Activite/delete.php?json=" .urlencode($ApiJSON);

  $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($user);
    
    $result = json_decode($response);

    if($result->status==1)
    {
      $_SESSION['flash']="Activite supprimée avec succes";
       
      echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
    }
    else
    {
      $_SESSION['flash']= $result->message; 
      
      echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

    }

    ob_end_flush();

    
?>