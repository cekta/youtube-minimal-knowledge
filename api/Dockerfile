FROM ubuntu:18.04
WORKDIR /app
RUN apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y php-cli php-xdebug
ENTRYPOINT ./endpoint.sh
EXPOSE 8000
