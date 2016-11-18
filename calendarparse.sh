#! /bin/bash
sed 's/, /,/g' thefinal.csv > data1.csv
sed 's/ ,/,/g' data1.csv > data2.csv
INPUT=data2.csv
IFS=,
[ ! -f $INPUT ] && { echo "$INPUT file not found"; exit 99; }
while read SUMMARY DATE STARTTIME ENDTIME VENUE DESCRIPTION
do
	echo "$SUMMARY
$VENUE
$DESCRIPTION
$DATE~T$STARTTIME:00+05:30
$DATE~T$ENDTIME:00+05:30" > output.txt
sed 's/~//g' output.txt > event.txt
done < $INPUT
IFS=$OLDIFS
rm data1.csv data2.csv output.txt
