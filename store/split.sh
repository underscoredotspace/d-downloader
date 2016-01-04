#!/bin/bash

while read p; do
#   getdate=`echo ${p/z\./} | awk -F'/' '{print " "$5" "$6" "$7}'`
   /home/operator11/dilbert/get_spec.pl $p
done < missing.txt
