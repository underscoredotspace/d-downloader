#!/usr/bin/perl

$spec_addr = "http://dilbert.com/strip/" . $ARGV[0] . "-" . $ARGV[1] . "-" . $ARGV[2] . "/";
$folder = $ARGV[0] . "/" . $ARGV[1] . "/";
$filename = $ARGV[2] . "z.";

$user_agent = "-A \"Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en-us) AppleWebKit/523.10.6 (KHTML, like Gecko) Version/3.0.4 Safari/523.10.6\"";

$rootpath = "/home/dilbert/dilbert/";

$dilbert = readpipe "curl --silent " . $user_agent . " " .  $spec_addr ;

$dilbert =~ /property="og:image" content="http:\/\/assets\.amuniversal\.com\/(.+)"\//;
# $dilbert =~ /(\/dyn.+zoom.(jpg|gif))/;

$getfile = $1; $ext = "gif";

# print "http://assets.amuniversal.com/" . $getfile;

$dum = system("mkdir -p " . $rootpath . $folder);
$dum = system("curl " . $user_agent . " --silent --output " . $rootpath . $folder . $filename . $ext . " http://assets.amuniversal.com/" . $getfile);

