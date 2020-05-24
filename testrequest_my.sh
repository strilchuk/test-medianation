#!/bin/bash

m_array=(ACL
BASELINE-CONTROL
BIND
CHECKIN
CHECKOUT
CONNECT
COPY
DELETE
GET
HEAD
LABEL
LINK
LOCK
MERGE
MKACTIVITY
MKCALENDAR
MKCOL
MKREDIRECTREF
MKWORKSPACE
MOVE
OPTIONS
ORDERPATCH
PATCH
POST
PRI
PROPFIND
PROPPATCH
PUT
REBIND
REPORT
SEARCH
TRACE
UNBIND
UNCHECKOUT
UNLINK
UNLOCK
UPDATE
UPDATEREDIRECTREF
VERSION-CONTROL
PURGE
VIEW
BAN
)

m_array=(PATCH)

currDate=$(date +"%Y:%m:%d %H:%M:%S") #2020:05:17 10:45:53
timeStamp=$(date -j -f "%Y:%m:%d %H:%M:%S" "$currDate" +%s)
#timeStamp=$((timeStamp+1))
rm result_my.html

for i in "${m_array[@]}"; 
do 
echo "$i";
curl --location --request $i 'http://medianation-test.strilchuk.ru/test' \
--header 'Referer: https://www.google.com/' \
--header 'Content-Type: application/json' \
--header 'Cookie: visit=33' \
--header 'User-Agent: "Bestbrowser"' \
--header 'Authorization: Basic YWRtaW46cXdlcnR5MTIz' \
--data-raw "$timeStamp" >> result_my.html
sleep 1;   
done

