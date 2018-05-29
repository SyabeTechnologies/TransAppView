<?php

  ob_start();
  session_start();
   include('api.php');
  if(isset($_POST['submit']))
  {
    
    $agence['pseudo'] = $_POST['pseudo'];

    $agence['password'] =$_POST['password'];

    $myJSON=json_encode($agence);
    
    $url = $connapi."User/login.php?json=". urlencode($myJSON) ;
    
    $user = curl_init($url);

    curl_setopt($user,CURLOPT_RETURNTRANSFER,true);

    $response = curl_exec($user);
    
    $result = json_decode($response);

    if ($result->status == 1)
    {
       $_SESSION['id'] = $result->data->ID;

       $_SESSION['pseudo'] = $result->data->Pseudo;

       $_SESSION['nomagence'] = $result->data->AgenceNom;

       $_SESSION['nomuser'] = $result->data->Nom;

       $_SESSION['agenceid'] = $result->data->AgenceID;

       $_SESSION['statut'] = 1;

       echo "<script type='text/javascript'>location.href = 'home/dashboard.php';</script>";
    } 
    else if ($result->status == 0)
    {
      $_SESSION['flash']=$result->message;

      echo "<script type='text/javascript'>location.href = 'index.php';</script>";
    }

  }

  ob_end_flush();
?>
