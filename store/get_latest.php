<?php
$DilbertFolder = "/home/dilbert/dilbert/";
$date_fmt = "Y m d";

$curr_dt = (int)file_get_contents($DilbertFolder . "latest");
$next_dt = strtotime("+1 day", $curr_dt);
print system($DilbertFolder . "get_spec.pl " . date ($date_fmt, $next_dt));
file_put_contents($DilbertFolder . "latest", $next_dt);

// Left here for fixing the date in ./latest
//$curr_dt = mktime(0,0,0,9,18,2014);
//file_put_contents($DilbertFolder . "latest", $curr_dt);
?>
