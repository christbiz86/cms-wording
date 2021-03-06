FROM 10.1.35.36:5000/devops/alpine_net:3.10
ENV DEBIAN_FRONTEND=noninteractive

# Add repos
RUN echo "http://dl-cdn.alpinelinux.org/alpine/edge/testing" >> /etc/apk/repositories

# Add basics first
RUN apk update && apk upgrade && apk add \
	bash apache2 apache2-ssl php7-apache2 curl ca-certificates openssl php7 php7-phar php7-json php7-iconv php7-openssl tzdata

# Setup apache and php
RUN apk add \
	php7-xdebug \
	php7-mcrypt \
	php7-mbstring \
	php7-gmp \
	php7-pdo_odbc \
	php7-dom \
	php7-pdo \
	php7-zip \
	php7-mysqli \
	php7-bcmath \
	php7-gd \
	php7-odbc \
	php7-pdo_mysql \
	php7-gettext \
	php7-tokenizer \
	php7-bz2 \
	php7-curl \
	php7-ctype \
	php7-session \
	php7-exif \
	php7-intl \
	php7-fileinfo \
	php7-ldap \
	php7-apcu

# Problems installing in above stack
RUN apk add php7-simplexml

RUN cp /usr/bin/php7 /usr/bin/php \
    && rm -f /var/cache/apk/*

# Add apache to run and configure
RUN sed -i "s/#LoadModule\ rewrite_module/LoadModule\ rewrite_module/" /etc/apache2/httpd.conf \
    && sed -i "s/#LoadModule\ session_module/LoadModule\ session_module/" /etc/apache2/httpd.conf \
    && sed -i "s/#LoadModule\ session_cookie_module/LoadModule\ session_cookie_module/" /etc/apache2/httpd.conf \
    && sed -i "s/#LoadModule\ session_crypto_module/LoadModule\ session_crypto_module/" /etc/apache2/httpd.conf \
    && sed -i "s/#LoadModule\ deflate_module/LoadModule\ deflate_module/" /etc/apache2/httpd.conf \
    && sed -i "s#^DocumentRoot \".*#DocumentRoot \"/app/public\"#g" /etc/apache2/httpd.conf \
    && sed -i "s#/var/www/localhost/htdocs#/app/public#" /etc/apache2/httpd.conf \
    && printf "\n<Directory \"/app/public\">\n\tAllowOverride All\n</Directory>\n" >> /etc/apache2/httpd.conf

RUN mkdir /etc/apache2/certs
COPY paggr-web-ssl* /etc/apache2/certs/
COPY paggr-web-site.conf /etc/apache2/conf.d/

RUN chmod 644 /etc/apache2/conf.d/paggr-web-site.conf
RUN chmod 644 /etc/apache2/certs/*

RUN mkdir /app && mkdir /app/public && chown -R apache:apache /app && chmod -R 755 /app && mkdir bootstrap

RUN echo "<?php phpinfo() ?>" > /app/public/info.php

RUN mkdir /app/public/paggr-web

COPY / /app/public/paggr-web/
#COPY ./application /app/public/paggr-web/application/
#COPY ./assets /app/public/paggr-web/assets/
#COPY ./system /app/public/paggr-web/system/
#COPY index.php /app/public/paggr-web/
#COPY .htaccess /app/public/paggr-web/

RUN chmod -R 755 /app/public/paggr-web/

COPY start.sh /bootstrap/
RUN chmod +x /bootstrap/start.sh
#RUN tr -d '\r' < /bootstrap/start.sh > /bootstrap/start.sh

ENV TZ Asia/Jakarta

EXPOSE 443

ENTRYPOINT ["bash", "/bootstrap/start.sh"]