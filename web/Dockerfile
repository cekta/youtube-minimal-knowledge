FROM ubuntu:18.04 as developer
ENV DEBIAN_FRONTEND noninteractive
ENV REACT_APP_API_URL=http://localhost:8000
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

FROM developer as builder
ENV REACT_APP_API_URL=http://api.localhost
COPY ./ /app
RUN yarn install \
    && yarn build

FROM nginx as production
COPY nginx.api.conf /etc/nginx/conf.d/api.project.conf
COPY nginx.web.conf /etc/nginx/conf.d/default.conf
COPY --from=builder /app/build /app
