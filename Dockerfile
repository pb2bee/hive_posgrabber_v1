FROM ubuntu:16.04

RUN apt-get update \
  && apt-get install -y nginx \
  && apt-get install -y php-fpm

COPY nginx etc/nginx
COPY html /var/www/html
COPY php/7.0 /etc/php/7.0
ADD c2-command /home/analysis/tools/c2-command

CMD /etc/init.d/nginx start \
  && /etc/init.d/php7.0-fpm start \
  && /bin/bash
