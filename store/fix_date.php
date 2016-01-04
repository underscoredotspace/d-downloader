<?php
$DilbertFolder = "/home/dilbert/dilbert/";
$date_fmt = "Y m d";

// Left here for fixing the date in ./latest
$curr_dt = mktime(0,0,0,11,02,2015);
file_put_contents($DilbertFolder . "latest", $curr_dt);
?>
