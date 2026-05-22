#!/bin/bash
#Program:
#
#History:
#2018.04.17 dk first script
#for((i=1;i<=10;i=i+1))
#do echo "$i"
#done
#for line in 'cat d.list'
#do
#	echo $line
#done
while read -r line
do
	echo $line
	rm "qq2_doc/$line"
	echo "rm $line"
done < d.list

