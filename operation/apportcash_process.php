<?php

   ob_start();

   session_start();

   include('../php/check.php');

   include('../api.php');

   if(isset($_POST['submit']))
   {
    $cash['date'] = $_POST['date'];

    $cash['heure'] = date("h:i:sa");

    $cash['montant'] = $_POST['montant'];
    
    $cash['agenceid'] = $_SESSION['agenceid'];
 
    $ApiJSON = json_encode($cash);

    $url = $connapi."Cash/apportcash.php?json=" .urlencode($ApiJSON);

    $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($user);
    
    $result = json_decode($response);
  
    if($result->status==1)
    {
      $_SESSION['flash']="Montant du cash bien effectuée";
      
      echo "<script type='text/javascript'>location.href = 'apportcash.php';</script>";
    }
    else
    {
      $_SESSION['flash'] = $result->message;

      echo "<script type='text/javascript'>location.href = 'apportcash.php';</script>";  

    }
  
   
   } 

   ob_end_flush();
?>