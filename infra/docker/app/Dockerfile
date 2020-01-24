ARG flavor=7.4-cli

FROM php:$flavor as base

LABEL maintainer="tshinow@gmail.com"

ENV CURRENT_DIR /var/www/circleci-workshop

WORKDIR $CURRENT_DIR

#==========================================================================
# Base
#==========================================================================
RUN apt update \
    && apt upgrade \
    && apt install -y \
        git \
        locales \
        vim \
        unzip \
        zip \
    && echo "ja_JP UTF-8" > /etc/locale.gen

#==========================================================================
# Build
#==========================================================================
FROM base as build

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . $CURRENT_DIR

RUN composer install

#==========================================================================
# Test
#==========================================================================
FROM build as test

COPY .env.test.local.dist .env

#==========================================================================
# Develop
#==========================================================================
FROM base as develop

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer



