# папка Infra
###docker-compose.yaml
```
version: '3.0'

services:

  slim-web:
    image: nginx:stable
    ports:
      - "8080:80"
    volumes:
      - ../project:/var/www/html
      - ./nginx/default.conf:/etc/nginx/conf.d/default.conf
    container_name: slim-web
    depends_on:
      - slim-php
  slim-php:
    build: ./php
    extra_hosts:
      - "host.docker.internal:host-gateway"
    volumes:
      - ../project:/var/www/html
      - ./php/xdebug.ini:/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
    environment:
      - PHP_IDE_CONFIG=serverName=Docker
    container_name: slim-php
```
##Папка nginx
###default.conf
```
server {
    index index.php;
    root /var/www/html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        include fastcgi_params;
        fastcgi_pass slim-php:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }

}
```
##Папка php
###Dockerfile
```
FROM php:8.0.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpq-dev

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www


COPY --chown=www:www . /var/www/html

USER www
```
###xdebug.ini
```
zend_extension=xdebug

[xdebug]
xdebug.mode=develop,debug
xdebug.client_host=host.docker.internal
xdebug.start_with_request=yes
xdebug.log=/tmp/xdebug.log
```
