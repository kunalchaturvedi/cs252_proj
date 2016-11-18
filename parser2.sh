#! /bin/bash

sed "s///g" datamail.txt>datamail2.txt

grep "EVENT::" datamail2.txt > ev1.csv 
grep "DATE::" datamail2.txt > ev2.csv
grep "STARTTIME::" datamail2.txt > ev3.csv
grep "ENDTIME::" datamail2.txt > ev4.csv
grep "LOCATION::" datamail2.txt > ev5.csv
grep "DESCRIPTION::" datamail2.txt > ev6.csv

paste ev1.csv ev2.csv ev3.csv ev4.csv ev5.csv ev6.csv -d',' > lol.csv
sed 's/EVENT:://g' lol.csv > final1.csv
sed 's/STARTTIME:://g'  final1.csv > final2.csv
sed 's/DATE:://g' final2.csv > final3.csv
sed 's/ENDTIME:://g' final3.csv > final4.csv
sed 's/LOCATION:://g' final4.csv > final5.csv
sed 's/DESCRIPTION:://g' final5.csv > thefinal.csv

rm final5.csv final4.csv final3.csv final2.csv final1.csv lol.csv
rm datamail.txt datamail2.txt ev1.csv ev2.csv ev3.csv ev4.csv ev5.csv ev6.csv
