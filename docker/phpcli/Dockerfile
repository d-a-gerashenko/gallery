FROM php:5.6-cli

RUN apt-get update --fix-missing && apt-get install -y less vim zip curl git zlib1g-dev php5-mysqlnd
RUN docker-php-ext-install zip pdo_mysql

ADD app.ini /usr/local/etc/php/conf.d/

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

#PHPUNIT
RUN composer global require "phpunit/phpunit"
ENV PATH /root/.composer/vendor/bin:$PATH
RUN ln -s /root/.composer/vendor/bin/phpunit /usr/bin/phpunit

#symfony
RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
RUN chmod a+x /usr/local/bin/symfony

#node
RUN apt-get -y install nodejs npm
RUN npm install -g bower grunt
RUN ln -s /usr/bin/nodejs /usr/bin/node

# install ruby-compass
RUN apt-get install -y -qq ruby-compass

WORKDIR /var/www/html


