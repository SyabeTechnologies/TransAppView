<?php
ob_start();
 session_start();
   include('../php/check.php');
   include('../api.php');
   if(isset($_POST['submit']))
   {
    $operation['uv'] = $_POST['uv'];
    $operation['date'] = date("Y-m-d");
    $operation['heure'] = date("h:i:s");
    $operation['type'] = "APPORTINIT";
    $operation['agenceid'] = $_SESSION['agenceid'];
    $operation['activiteid'] = $_POST['activite'];
  
    $ApiJSON = json_encode($operation);

    $url = $connapi."Operation/create.php?json=" .urlencode($ApiJSON);

    $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($user);
    
    $result = json_decode($response);
  
    if($result->status==1)
    {
      $_SESSION['flash'] = "Montant UV bien effectuée";
       
      echo "<script type='text/javascript'>location.href = 'operate.php';</script>";
    }
    else
    {
      $_SESSION['flash'] = $result->message;
       
      echo "<script type='text/javascript'>location.href = 'operate.php';</script>";
    }
  
   }
   
   ob_end_flush();
?>