#!/bin/bash
chown -R root:www-data /etc/squid/*
chown -R root:www-data /var/www/*
chown www-data:www-data /etc/squid
chown -R root:www-data /etc/init.d/squid
touch /etc/squid/passwd
touch /etc/squid/squid.conf
echo 'www-data ALL=(root) NOPASSWD:/etc/init.d/squid restart'>> /etc/sudoers
