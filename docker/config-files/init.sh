#!/bin/bash
sed -i '/session    required   pam_loginuid.so/c\#session    required   pam_loginuid.so' /etc/pam.d/crond
/usr/sbin/rsyslogd
/usr/sbin/crond

/usr/sbin/php-fpm -R
/usr/sbin/nginx -g "daemon off;"
