<?php

include('fb-config.php');

$login_fb_button  = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if(isset($_GET['code']))
{
 if(isset($_SESSION['access_key']))
 {
  $access_key = $_SESSION['access_key'];
 }
 else
 {
  $access_key = $facebook_helper->getAccessToken();

  $_SESSION['access_key'] = $access_key;

  $facebook->setDefaultAccessToken($_SESSION['access_key']);
 }

 $_SESSION['user_id'] = '';
 $_SESSION['username'] = '';
 $_SESSION['userEmail'] = '';
 $_SESSION['user_image'] = '';

 $graph_response = $facebook->get("/me?fields=name,email", $access_key);

 $facebook_user_info = $graph_response->getGraphUser();

 if(!empty($facebook_user_info['id']))
 {
  $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
 }

 if(!empty($facebook_user_info['name']))
 {
  $_SESSION['username'] = $facebook_user_info['name'];
 }

 if(!empty($facebook_user_info['email']))
 {
  $_SESSION['userEmail'] = $facebook_user_info['email'];
 }
 $qry1 = mysqli_query($conn,"insert into users(username,userEmail,userStatus) values('".$_SESSION['username']."','".$_SESSION['userEmail']."','Y')");
}

?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
          if(!isset($_SESSION['access_key']))
              {
              $login_fb_button = '<a href="'.$facebook_helper->getLoginUrl('https://quiz.radoncosmos.in/auth/facebook/').'"><img class="btn-google" src="http://www.vasplus.info/demos/login_with_fb/images/login_with_facebook.png" /></a>';
              }

              if($login_fb_button == '')
              {
                echo "<p class='redirect'>Redirecting...</p>"; 
              echo "<script>window.location.href='../../welcome.php'</script>"; 
              }
              else
              {
              echo '<div align="center">'.$login_fb_button . '</div>';
              }
           ?>
  
  <style>
      body{display: flex; justify-content: center; align-items: center}
      @media only screen and (max-width: 600px) {img{width: 300px}}
  </style>
 </body>
</html