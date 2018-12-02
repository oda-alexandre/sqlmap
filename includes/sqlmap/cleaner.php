<?php

  include("./inc/config.php");

  if((isset($_POST['value'])) && ($_POST['value']=='unload') && (isset($_POST['target']))) {

    $t = preg_replace("#\.\./|\.\.%2f|\.\.%25%5c|\.\.%5c|\.\.%bg%qf|\.\.%u2215|\.\.%c0%9v|\.\.%u2216|%2e%2e/#i", "", $_POST['target']);
    if((file_exists(TMP_PATH . $t)) && (is_dir(TMP_PATH . $t))) {
      foreach(glob(TMP_PATH . $t . '/*.*') as $file){
        unlink($file);
      }
      rmdir(TMP_PATH . $t); 
    }
  }
?>
