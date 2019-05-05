FROM ubuntu:18.04 as developer
WORKDIR /app
RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y php-cli php-xdebug
ENTRYPOINT ./endpoint.sh
EXPOSE 8000

FROM php:7.2-fpm as production
COPY ./ /app
WORKDIR /app/public
