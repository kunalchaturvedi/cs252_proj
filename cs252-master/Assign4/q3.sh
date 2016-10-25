#!/bin/bash
n=pratik
e=pratikab@cse.iitk.ac.in
P=A56465
d=50   
function mail_data {
  	echo "MAIL FROM: bhangalepratik8@gmail.com"
  	echo "RCPT TO: <$e>"
  	echo "DATA"
	echo "From: bhangalepratik8@gmail.com"
  	echo "To: <$e>"
  	echo "Subject: Thanking You for your Donations"
  	echo "Dear $n

	Thank you for donating Rs $d to the Department of CSE,
IIT Kanpur. We will send you the 80G tax letter once you confirm the
details below.

Name:  $n
Email: $e
PAN No: $p

Thanking you,

The Head,
Dept of Computer Science and Engg,
IIT Kanpur, Kanpur, UP, India.
208016."
  	echo "."
  	echo "quit"
}
IFS=,
cat q2.csv | while read name email pan donation
do
	n=$name
	e=$email
	p=$pan
	d=$donation 
 	mail_data| nc smtp.cse.iitk.ac.in 25

done
