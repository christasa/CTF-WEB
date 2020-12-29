#! /bin/sh

mysql_ready() {
    mysqladmin ping -h 127.0.0.1 -uping -pping > /dev/null 2>&1
}

run_mysql() {
    /usr/bin/mysqld --user=root --skip-name-resolve --skip-networking=0 &
}

while !(mysql_ready)
do
    mysql_ready
    if [ $? -ne 0 ]; then
        run_mysql
    fi
    sleep 3s
done

mysql_ready
if [ $? -ne 0 ]; then
    run_mysql
fi
php-fpm &
nginx &

tail -F /dev/null
