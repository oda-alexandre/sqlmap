<?php

  @session_start();
  @set_time_limit(0);
  $sess = session_id();


  if($_SESSION['authenticated'] == true) {
    header("Location: /sqlmap/admin/index.php");
  }

  $bad_pass = 'no';
  include("../inc/config.php");
  if((trim($_POST['username']) == ADMIN_USER) && (trim($_POST['password']) == ADMIN_USER)) {
    $_SESSION['authenticated'] = true;
    header("Location: /sqlmap/admin/index.php");
  } else {
    if((isset($_POST['username'])) && (isset($_POST['password']))) {
      $bad_pass = 'yes';
    }
  }

  $salt = "!SQL!";
  $token = sha1(mt_rand(1, 1000000) . $salt);
  $_SESSION['token'] = $token;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title id="ttl">SQLMAP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/sqlmap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/sqlmap/css/css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/sqlmap/js/bootstrap.min.js"></script>
    <script src="/sqlmap/js/sqlmap.js"></script>
  </head>
  <body>
    <br />

    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
          <h1 class="text-center login-title">administrateur</h1><br />
          <?php
            if($bad_pass == 'yes') {
              echo '<div class="epic_fail" align="center">';
              echo "Bad Username and/or Password!<br />";
              echo "Please try again or contact the site administrator...<br /><br />";
              echo "</div>";
            }
          ?>
          <div class="account-wall">
            <form class="form-horizontal" role="form" id="myLoginForm" action="/sqlmap/admin/login.php" method="POST">
              <input type="hidden" name="token" value="<?php echo $token; ?>">
              <input type="text" name="username" class="form-control" placeholder="Username" required autofocus><br />
              <input type="password" name="password" class="form-control" placeholder="Password" required><br />
              <input type="submit" class="btn" name="submit" value="Login"/>
            </form>
          </div>
        </div>
      </div>
    </div>

    <br /><br /><br />
    <div class="footer" align="center">
        <a href="/sqlmap/admin/logout.php">Quitter</a><br />
        en savoir plus sur <a href="http://sqlmap.org/" target="_blank">SQLMAP</a>, Visitez <a href="http://sqlmap.org/" target="_blank">site web!</a><br/>
        GNU General Public License oda-alexandre.github.io 2018<br/>
    </div>
    <br/><br/>
  </body>
</html>
