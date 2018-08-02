FROM alpine:3.7

# Install packages
RUN apk --no-cache add php7 php7-fpm php7-mysqli php7-json php7-openssl php7-tokenizer php7-curl \
    php7-zlib php7-xml php7-simplexml php7-xmlwriter php7-phar php7-intl php7-dom php7-xmlreader php7-ctype \
    php7-mbstring php7-gd php7-bz2 nginx supervisor curl git mysql mysql-client

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Configure nginx
COPY config/nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
COPY config/fpm-pool.conf /etc/php7/php-fpm.d/zzz_custom.conf
COPY config/php.ini /etc/php7/conf.d/zzz_custom.ini

# Configure supervisord
COPY config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Install xdebug
#RUN yes | pecl install xdebug \
#    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

# Install wpcli
RUN set -ex; \
    curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar; \
    chmod +x wp-cli.phar; \
    mv wp-cli.phar /usr/local/bin/wp

# Add application
RUN mkdir -p /var/www/html

# Composer install
COPY ./composer.json /var/www/html/composer.json
WORKDIR /var/www/html
RUN set -ex; \
    composer install

COPY ./docroot/index.php /var/www/html/docroot/index.php
COPY ./docroot/wp-config.php /var/www/html/docroot/wp-config.php

#COPY ./wp-content/plugins /var/www/html/wordpress/wp-content/plugins
#COPY ./wp-content/bb-base /var/www/html/wordpress/wp-content/bb-base
#COPY ./wp-content/themes /var/www/html/wordpress/wp-content/themes

#WORKDIR /var/www/html/wordpress/wp-content/themes/BeachbodyBlog
#RUN set -ex; \
#    composer install

WORKDIR /var/www/html/docroot

EXPOSE 80 443
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
