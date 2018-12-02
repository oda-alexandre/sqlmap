<?php

  @session_start();
  @set_time_limit(0);
  $sess = session_id();

  if($_SESSION['authenticated'] != true) {
    header("Location: /sqlmap/admin/login.php");
  }

  if((isset($_POST['myAdminID'])) && (strlen(trim($_POST['myAdminID'])) == 32)) {
    $_SESSION['myAdminID'] = trim($_POST['myAdminID']);
  }

  include("../inc/config.php");
  include("../inc/SQLMAPClientAPI.class.php");

  $salt = "!SQL!";
  $token = sha1(mt_rand(1, 1000000) . $salt);
  $_SESSION['token'] = $token;

  $taskConfig = array();
  if(isset($_SESSION['myAdminID'])) {
    $sqlmap = new SQLMAPClientAPI();

    if((isset($_GET['task'])) && (trim($_GET['task']) != "")) {
      $actionTaskId = trim($_GET['task']);
      if(isset($_GET['action'])) {
        switch(trim($_GET['action'])) {
          case "conf":
            $taskConfig = $sqlmap->listOptions($actionTaskId);
            break;

          case "stop":
            $sqlmap->stopScan($actionTaskId);
            break;

          case "kill":
            $sqlmap->killScan($actionTaskId);
            break;

          case "del":
            $sqlmap->deleteTaskID($actionTaskId);
            break;

          default:
            break;
        }
      }
    }
  }
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

<?php

  echo "<h1 align=\"center\">SQLMAP Web GUI - Admin Panel</h1>";
  if(isset($_SESSION['myAdminID'])) {
    $taskList = $sqlmap->adminListTasks(trim($_SESSION['myAdminID']));
    if(!$taskList) {
?>

    <br />
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="epic_fail">[WARNING] '<?php echo htmlentities(trim($_SESSION['myAdminID']), ENT_QUOTES, 'UTF-8'); ?>' - id invalide!</div><br />
          <form class="form-horizontal" role="form" id="myAdminID" action="/sqlmap/admin/index.php" method="POST">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <input type="text" name="myAdminID" class="form-control" placeholder="78203fa6630db256fcd7f57ea8420eb8" required autofocus><br />
            <input type="submit" class="btn" name="submit" value="Set Admin ID"/>
          </form><br />
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>

<?php
    } else {
?>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="adminIdDisplay" id="adminIdDisplay" align="center">
            <h4>
              <b>Admin ID:</b> <?php echo htmlentities(trim($_SESSION['myAdminID']), ENT_QUOTES, 'UTF-8'); ?><br />
              <b>Nombre total de tâches:</b> <?php echo htmlentities($taskList['tasks_num'], ENT_QUOTES, 'UTF-8'); ?><br />
            </h4>
            <br /><br />

            <div class="adminTasksDisplay" id="adminTasksDisplay">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <?php
                  if((isset($_GET['task'])) && (isset($_GET['action'])) && (trim($_GET['action']) == "conf")) {
                    echo '<br /><br />';
                    echo '<label for="results_textarea">ScanID: ' . htmlentities(trim($_GET['task']), ENT_QUOTES, 'UTF-8') . ', API Scan Configuration</label>';
                    echo '<textarea class="form-control" id="task_configuration_textarea" rows="20">';
                    echo "[*] API Scan Configuration:\n";
                    print_r(htmlentities($sqlmap->listOptions(trim($_GET['task']))['options']), ENT_QUOTES, 'UTF-8');
                    echo '</textarea><br />';
                  } else {
                  ?>
                    <table class="table table-hover" id="adminTasksDisplayTable">
                      <thead>
                        <tr>
                          <th>TaskID</th>
                          <th>Target</th>
                          <th>Status</th>
                          <th colspan="5">Options</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        foreach($taskList['tasks'] as $t) {
                          $status = $sqlmap->checkScanStatus($t);
                          $taskConfig = $sqlmap->listOptions($t);
                          echo "<tr>";
                            echo "<td>";
                            echo htmlentities($t, ENT_QUOTES, 'UTF-8');
                            echo "</td>";
                            if(sizeof($taskConfig) > 0) {
                              $targetHost = parse_url($taskConfig['options']['url'], PHP_URL_HOST);
                              echo "<td>" . htmlentities($targetHost, ENT_QUOTES, 'UTF-8') . "</td>";
                            } else {
                              echo "<td> - </td>";
                            }
                            if(isset($status['status'])) {
                              echo "<td>" . htmlentities($status['status'], ENT_QUOTES, 'UTF-8') . "</td>";
                            } else {
                              echo "<td> - </td>";
                            }
                            echo "<td> <a href=\"/sqlmap/admin/index.php?task=" . htmlentities($t, ENT_QUOTES, 'UTF-8') . "&action=conf\" target=\"_blank\">Conf</a> </td>";
                            if($status['status'] == 'running') {
                              echo "<td> <a href=\"/sqlmap/admin/index.php?task=" . htmlentities($t, ENT_QUOTES, 'UTF-8') . "&action=stop\">Stop</a> </td>";
                              echo "<td> <a href=\"/sqlmap/admin/index.php?task=" . htmlentities($t, ENT_QUOTES, 'UTF-8') . "&action=kill\">Kill</a> </td>";
                            } else {
                              echo "<td> - </td>";
                              echo "<td> - </td>";
                            }
                            echo "<td> <a href=\"/sqlmap/admin/index.php?task=" . htmlentities($t, ENT_QUOTES, 'UTF-8') . "&action=del\">Del</a> </td>";
                          echo "</tr>";
                        }
                      ?>
                      </tbody>
                    </table>
                  <?php } ?>
                </div>
                <div class="col-md-2"></div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
<?php
    }
  } else {

?>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="epic_fail">[WARNING] pas d'id administrateur défini!</div><br />
          <form class="form-horizontal" role="form" id="myAdminID" action="/sqlmap/admin/index.php" method="POST">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <input type="text" name="myAdminID" class="form-control" placeholder="78203fa6630db256fcd7f57ea8420eb8" required autofocus><br />
            <input type="submit" class="btn" name="submit" value="Set Admin ID"/>
          </form><br />
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
<?php

  }
?>

    <br /><br /><br />
    <div class="footer" align="center">
        <a href="/sqlmap/admin/logout.php">Quitter</a><br />
        en savoir plus sur <a href="http://sqlmap.org/" target="_blank">SQLMAP</a>, Visitez <a href="http://sqlmap.org/" target="_blank">site web!</a><br/>
        GNU General Public License oda-alexandre.github.io 2018<br/>
    </div>
    <br/><br/>
  </body>
</html>
