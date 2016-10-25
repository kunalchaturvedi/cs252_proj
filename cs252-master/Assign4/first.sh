#!/bin/bash
function commands {
	echo "tag login $user $passd"
	echo "tag select inbox"
	echo "tag search sentsince 1-aug-2016 HEADER Content-type "multipart/mixed""
while sleep 1; do
	echo "tag logout"
done
}
echo "Username: "
read user
echo "Password: "
stty -echo
read  passd
stty echo
commands | openssl s_client -CAfile /home/ubuntu/certificate.crt -connect imap.cse.iitk.ac.in:993

