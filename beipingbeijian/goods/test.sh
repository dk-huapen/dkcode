#!/bin/bash
for file_name in `ls img`
do
	#echo ${file_name%.*}
	mkdir img/${file_name%.*}
	mv img/$file_name img/${file_name%.*}/
	#echo ${file_name%.*}_dnt.webp
	/usr/local/imagemagick/bin/convert img/${file_name/.*}/$file_name img/${file_name/.*}/${file_name%.*}_dnt.webp

done
