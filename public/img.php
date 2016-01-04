<?php
  include_once "config.php";

  $date_fmt     = "Y/m/d";
  $the_d = $_GET["d"];
  $the_m = $_GET["m"];
  $the_y = $_GET["y"];

  $curr_nm = glob($ImgLocation . $the_y . "/" .  $the_m . "/" . $the_d . "z*");
  $filename = $curr_nm[0];
  $ext = substr(strrchr($filename, "."), 1);
  if ($ext =="gif") {
    $type = "image/gif";
  } else {
    $type = "image/jpeg";
  }

  ob_end_clean();

  header("Content-Type: " . $type);
  header("Content-Length: " . filesize($filename));
  readfile($filename);
  flush();
  exit;
?>
