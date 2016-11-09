#! /bin/bash
echo lol
sed 's/, /,/g' data.csv > data1.csv
sed 's/ ,/,/g' data1.csv > data2.csv
INPUT=data2.csv
IFS=,
echo lolllol
[ ! -f $INPUT ] && { echo "$INPUT file not found"; exit 99; }
echo lolllalaso
while read SUMMARY DATE STARTTIME ENDTIME VENUE DESCRIPTION
do
	echo lol--lol
	echo "{
	  'summary': '$SUMMARY',
	  'location': '$VENUE',
	  'description': '$DESCRIPTION',
	  'start': {
		'dateTime': '$DATE~T$STARTTIME:00+05:30',
	  },
	  'end': {
		'dateTime': '$DATE~T$ENDTIME:00+05:30',
	  },
}" > output.txt
sed 's/~//g' output.txt > finaloutput.csv
done < $INPUT
IFS=$OLDIFS
rm data1.csv data2.csv output.txt