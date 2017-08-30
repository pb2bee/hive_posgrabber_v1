FROM nginx

RUN apt-get update \
  && apt-get install -y php-fpm \
  && php -v \
  && php-fpm7.0 -v

COPY nginx /etc/nginx/
COPY html /var/www/html
COPY php/7.0 /etc/php/7.0
