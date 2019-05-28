FROM ubuntu:18.04 as developer
WORKDIR /app
RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y php-cli php-json php-xdebug curl \
    && curl -s https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer
ENTRYPOINT ./endpoint.sh
EXPOSE 8000

FROM developer as builder
COPY ./ /app
RUN composer install

FROM php:7.2-fpm as production
COPY --from=builder /app /app
WORKDIR /app/public
