<?php
  include_once "config.php";

  $date_fmt = "Y/m/d";
  $the_d = $_GET["d"];
  $the_m = $_GET["m"];
  $the_y = $_GET["y"];

  if (($the_d  == null)||($the_y  == null)||($the_y  == null)) {
    header("location:" . $DilbertDomain . date($date_fmt, (int)file_get_contents($ImgLocation . "latest")));
  } else {
    $curr_dt = mktime(0,0,0,$the_m,$the_d,$the_y);
 }

  $prev_dt = strtotime("-1 day", $curr_dt);
  $next_dt = strtotime("+1 day", $curr_dt);

  $next_ln = date ($date_fmt, $next_dt);
  $prev_ln = date ($date_fmt, $prev_dt);

  $curr_nm = $DilbertDomain . "i/" . date($date_fmt, $curr_dt);
  $prev_nm = glob($ImgLocation . date ($date_fmt, $prev_dt) . "*");
  $next_nm = glob($ImgLocation . date ($date_fmt, $next_dt) . "*");

  $separator = "";
  if (strlen($prev_nm[0])!=0) {
    $prev_txt = "<a href=\"/" . $prev_ln . "\">PREV</a>";
    $prev = true; }
  if (strlen($next_nm[0])!=0) {
    $next_txt = "<a href=\"/" . $next_ln . "\">NEXT</a>";
    $next = true; }
  if ($next && $prev) { $separator = " | "; }

?><html>
  <head><!--New Style-->
    <title><?=date("D d M y",$curr_dt)?></title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47786392-1', 'op11.co.uk');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>
    <style type="text/css">
      .dilbimg {
      visibility: hidden;}
    </style>
    <script type="text/javascript" >
      function imageLoaded(imageElement) {
	imageElement.style.visibility='visible';}
    </script>
  <head>
  <body>
    <?=$prev_txt?><?=$separator?><?=$next_txt?><p />
    <img src="<?=$curr_nm?>" class="dilbimg" onload="imageLoaded(this)"/>
  </body>
</html>
