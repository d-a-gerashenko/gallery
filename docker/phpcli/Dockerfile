FROM php:5.6-cli

RUN apt-get update --fix-missing
# install common
RUN apt-get install -y less vim zip curl git
# for gd
RUN apt-get install -y libfreetype6-dev \
                        libjpeg62-turbo-dev \
                        libpng12-dev \
                        libxpm-dev \
                        libvpx-dev

RUN docker-php-ext-configure gd \
    		--with-freetype-dir=/usr/lib/x86_64-linux-gnu/ \
    		--with-jpeg-dir=/usr/lib/x86_64-linux-gnu/ \
    		--with-xpm-dir=/usr/lib/x86_64-linux-gnu/ \
    		--with-vpx-dir=/usr/lib/x86_64-linux-gnu/ \
    	&& \
    docker-php-ext-install  gd \
                            pdo_mysql

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


