FROM php:5.6-fpm

RUN docker-php-ext-install pdo pdo_mysql

ADD app.ini /usr/local/etc/php/conf.d/

ADD app.pool.conf /etc/php5/fpm/pool.d/

RUN usermod -u 1000 www-data

EXPOSE 9000