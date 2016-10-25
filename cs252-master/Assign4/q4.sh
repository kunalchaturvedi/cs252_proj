#!/bin/bash
IFS=,
cat q2.csv | while read Name Email PAN Donation
do
m4 -DNAME_OF_USER="$Name" -DEMAIL_OF_USER="$Email" -DPAN_OF_USER="$PAN" -DDONATION_OF_USER="$Donation" mail-pdf.m4 > temp.tex
m4 -DNAME_OF_USER="$Name" -DEMAIL_OF_USER="$Email" -DPAN_OF_USER="$PAN" -DDONATION_OF_USER="$Donation" mail-templete.m4 > temp.txt
 pdflatex temp.tex
cat temp.txt | mail -s "Thank You for Your Donations" -A temp.pdf $Email
done
rm temp.txt temp.aux temp.tex temp.log temp.pdf
