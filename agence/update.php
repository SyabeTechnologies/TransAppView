<?php
  ob_start();

   session_start();

   include('../php/check.php');

   include('../api.php');

   if(isset($_POST['submit']))
   {
      $transaction['id'] = $_POST['id'];
      $transaction['montant'] = $_POST['montant'];
      $transaction['type'] = $_POST['type'];
      $transaction['frais'] = $_POST['frais'];

      $ApiJSON = json_encode($transaction);

      $url = $connapi."Transaction/update.php?json=" .urlencode($ApiJSON);

      $user = curl_init($url);

      curl_setopt($user,CURLOPT_RETURNTRANSFER, true);

      $response = curl_exec($user);
      
      $result = json_decode($response);

      if($result->status==1)
      {
        $_SESSION['flash']="Transaction modifiée";

        echo "<script type='text/javascript'>location.href = 'display.php';</script>";
      }
      else
      {
        $_SESSION['flash'] = $result->message;

        echo "<script type='text/javascript'>location.href = 'edit.php';</script>"; 

      }
	
   } 

   ob_end_flush();
?>