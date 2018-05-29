<?php
ob_start();
 session_start();
   include('../php/check.php');
   include('../api.php');
   if(isset($_POST['submit']))
   {
    $operation['date'] = $_POST['date'];
    $operation['heure'] = date("h:i:sa");
    $operation['montant'] = $_POST['montant'];
    $operation['type'] = "APPORTUV";
    $operation['agenceid'] = $_SESSION['agenceid'];
    $operation['activiteid'] = $_POST['activiteid'];
  
    $ApiJSON = json_encode($operation);

    $url = $connapi."Operation/selectapportuv.php?json=" .urlencode($ApiJSON);

    $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($user);
    
    $result = json_decode($response);
  
    if($result->status==1)
    {
      $_SESSION['flash'] = "UV ajouté avec success";
       
      echo "<script type='text/javascript'>location.href = 'apportuv.php';</script>";
    }
    else
    {
      $_SESSION['flash'] = $result->message;

      echo "<script type='text/javascript'>location.href = 'apportuv.php';</script>"; 

    }
   
   } 

   ob_end_flush();
?>