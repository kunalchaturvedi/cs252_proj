#!/bin/bash
IFS=,
cat q2.csv | while read Name Email PAN Donation
do
m4 -DNAME_OF_USER="$Name" -DEMAIL_OF_USER="$Email" -DPAN_OF_USER="$PAN" -DDONATION_OF_USER="$Donation" mail-templete.m4 | mail -s "Thanking for your Donations" $Email
done
