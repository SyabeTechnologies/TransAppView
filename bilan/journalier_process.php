<?php
   ob_start();

   session_start();

   include('../api.php');

   include('../php/check.php');
   
   if(isset($_POST['submit']))
   {
    $bilan['date'] = $_POST['date'];
   
    $ApiJSON = json_encode($bilan);

    $url = $connapi."Bilan/selectdate.php?json=" .urlencode($ApiJSON);

    $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($user);
    
    $result = json_decode($response);

    if($result->status==1)
    {
      $_SESSION['date'] = $_POST['date'];
      
      echo "<script type='text/javascript'>location.href = 'journalier1.php';</script>";

    }
    else
    {
      $_SESSION['flash'] = $result->message;

      echo "<script type='text/javascript'>location.href = 'journalier.php';</script>"; 

    }
	
   
   } 

   ob_end_flush();
?>