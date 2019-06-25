#!/usr/bin/env bash

apt-get -y install cron
cp /app/bin/crontab /var/spool/cron/crontabs/www-data
chown www-data /var/spool/cron/crontabs/www-data
chmod 0600 /var/spool/cron/crontabs/www-data
touch /var/log/laravel-scheduler.log
chown www-data:www-data /var/log/laravel-scheduler.log
service cron start
echo 'tailing logs at /var/log/laravel-scheduler.log'
tail -f /var/log/laravel-scheduler.log
