FROM php:8.0-alpine

ARG USER_ID

ARG GROUP_ID

RUN groupadd -g $GROUP_ID user 

RUN useradd -D -g -G $GROUP_ID -u $USER_ID user

USER user

WORKDIR /src
