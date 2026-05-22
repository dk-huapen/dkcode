#!/bin/bash

DATE=`date +%F`

/bin/php /var/www/html/lib/fpdf/save.php
#su - debian_ibm -c "/usr/bin/uuencode /var/www/html/diary/diary/log/$DATE.pdf $DATE.pdf | mail -s diary 18803555056@163.com"
#/usr/bin/uuencode /var/www/html/diary/diary/log/$DATE.pdf $DATE.pdf | mail -s rekongdiary 18803555056@163.com
echo "$DATE班组日志！"|mail -s diary -A /var/www/html/diary/diary/log/$DATE.pdf 18803555056@163.com
