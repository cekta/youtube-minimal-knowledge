FROM ubuntu:18.04
ENV DEBIAN_FRONTEND noninteractive
WORKDIR /app
RUN apt-get update \
    && apt-get install -y curl gnupg2 \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get upgrade -y \
    && apt-get install -y yarn
ENTRYPOINT ./endpoint.sh
EXPOSE 8000
