ARG PHP_VERSION=8.4
ARG COMPOSER_VERSION=latest

###########################################
# PHP dependencies
###########################################

FROM composer:${COMPOSER_VERSION} AS vendor
WORKDIR /var/www
ARG TESTING=false
COPY composer* ./
RUN composer install \
    $(if [ "$TESTING" != "true" ]; then echo "--no-dev"; fi) \
    --no-interaction \
    --prefer-dist \
    --ignore-platform-reqs \
    --optimize-autoloader \
    --apcu-autoloader \
    --ansi \
    --no-scripts \
    --audit

###########################################

RUN mkdir -p \
    storage/framework/{sessions,views,cache} \
    storage/logs \
    bootstrap/cache \
     && chmod -R ug+rwx storage bootstrap/cache

EXPOSE 9000
