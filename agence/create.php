<?php
ob_start();
   session_start();
   include('../php/check.php');
   include('../api.php');
   if(isset($_POST['submit']))
   {
    $transaction['date'] = date("Y-m-d");
    $transaction['heure'] = date("h:i:sa");
    $transaction['montant'] = $_POST['montant'];
    $transaction['numero'] = $_POST['numero'];
    $transaction['type'] = $_POST['type'];
    $transaction['agenceid'] = $_SESSION['agenceid'];
    $transaction['activiteid'] = $_POST['activite'];
    $transaction['userid'] = $_SESSION['id'];
    $transaction['pseudo']=$_SESSION['pseudo'];

  
    $ApiJSON = json_encode($transaction);

    $url = $connapi."Transaction/create.php?json=" .urlencode($ApiJSON);

    $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($user);
    
    $result = json_decode($response);
  
    if($result->status==1)
    {
      $_SESSION['flash']="Transaction effectuée";
      
      echo "<script type='text/javascript'>location.href = 'dashboard_add.php';</script>";
    }
    else
    {
      $_SESSION['flash'] = $result->message;

      echo "<script type='text/javascript'>location.href = 'dashboard_add.php';</script>";

    }
  
   
   } 

   ob_end_flush();
?>