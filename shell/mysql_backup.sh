#!/bin/bash
#Database info
DB_USER="root"
DB_PASS="dk1314lich,forever!"
DB_NAME1="db_rekong"
DB_NAME2="db_huapen"
DB_NAME3="opcuasis"
#BACK_DIR="/var/www/html/mysql_backup"
BACK_DIR="/var/www/html/my_data/mysql_backup"
DATE=`date +%F`
yestoday=$(date -d '-7 day' +%Y-%m-%d)

mkdir -p $BACK_DIR/$DATE
echo "开始本地备份..."
/usr/bin/mysqldump -u$DB_USER -p$DB_PASS $DB_NAME1 > $BACK_DIR/$DATE/$DB_NAME1'_'$DATE.sql
/usr/bin/mysqldump -u$DB_USER -p$DB_PASS $DB_NAME2 > $BACK_DIR/$DATE/$DB_NAME2'_'$DATE.sql
/usr/bin/mysqldump -u$DB_USER -p$DB_PASS $DB_NAME3 > $BACK_DIR/$DATE/$DB_NAME3'_'$DATE.sql
echo "$DATE db backup success!"
echo "删除7天前的备份..."
rm -rf $BACK_DIR/$yestoday
