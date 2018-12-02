<?php

  @session_start();
  @set_time_limit(0);
  $sess = session_id();
  $salt = "!SQL!";
  $token = sha1(mt_rand(1, 1000000) . $salt);
  $_SESSION['token'] = $token;

  include_once("header.php");
  ?>

    <div class="container">

      <div class="jumbotron" id="jumbotron">
        <p style="font-size=18px; font-weight: bold;">
          SQLMAP
        </p>

        <p style="font-size=12px;">
          Utilisez les onglets ci-dessous pour configurer vos paramètres de numérisation,<br />
          Ensuite, cliquez simplement sur le bouton en bas lorsque vous avez terminé pour lancer un nouveau scan!<br />
        </p>

      </div>

      <form class="form-horizontal" role="form" id="myForm" action="/sqlmap/scans.php" method="POST" target="_blank">
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <div class="settings" id="settings">
          <div class="nav_wrap" id="nav_wrap">
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#" onClick="tabFlipper(1);" style="font-size=14px; font-weight: bold;">Basic</a></li>
              <li><a href="#" onClick="tabFlipper(3);" style="font-size=14px; font-weight: bold;">Demande</a></li>
              <li><a href="#" onClick="tabFlipper(2);" style="font-size=14px; font-weight: bold;">Injection & Techniques</a></li>
              <li><a href="#" onClick="tabFlipper(6);" style="font-size=14px; font-weight: bold;">Detection</a></li>
              <li><a href="#" onClick="tabFlipper(4);" style="font-size=14px; font-weight: bold;">Enumeration</a></li>
              <li><a href="#" onClick="tabFlipper(5);" style="font-size=14px; font-weight: bold;">Access</a></li>
            </ul>
          </div>
          <br />

          <div class="settings_basics_container" id="settings_basics_container">
            <?php include("basics.php"); ?>
          </div>

          <div class="settings_request_container" id="settings_request_container">
            <?php include("request.php"); ?>
          </div>

          <div class="settings_idt_container" id="settings_idt_container">
            <?php include("idt.php"); ?>
          </div>

          <div class="settings_idt2_container" id="settings_idt2_container">
            <?php include("idt2.php"); ?>
          </div>

          <div class="settings_enum_container" id="settings_enum_container">
            <?php include("enum.php"); ?>
          </div>

          <div class="settings_access_container" id="settings_access_container">
            <?php include("access.php"); ?>
          </div>
        </div>

        <br /><br />
        <input type="submit" class="btn" name="submit" value="Run SQLMAP Web Scan"/>
        <br /><br />
      </form>
    </div>


  <?php
  include_once("footer.php");

?>
