FROM alpine:3.7

# Install packages
RUN apk --no-cache add php7 php7-fpm php7-mysqli php7-json php7-openssl php7-tokenizer php7-curl \
    php7-zlib php7-xml php7-simplexml php7-xmlwriter php7-phar php7-intl php7-dom php7-xmlreader php7-ctype \
    php7-mbstring php7-gd php7-bz2 php7-xdebug nginx supervisor nodejs vim curl git mysql mysql-client bash subversion

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Configure nginx
COPY config/nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
COPY config/fpm-pool.conf /etc/php7/php-fpm.d/zzz_custom.conf
COPY config/php.ini /etc/php7/conf.d/zzz_custom.ini

# Configure supervisord
COPY config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

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

COPY ./config/wp-config.php /var/www/html/wp-config.php
COPY ./config/index.php /var/www/html/index.php


COPY ./custom-content /var/www/html/custom-content

RUN npm install -g eslint; \
    npm install -g stylelint

EXPOSE 80 443
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
