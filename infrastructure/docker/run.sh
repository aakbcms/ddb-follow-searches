#!/bin/sh

# Exit when any command fails
set -e
set -x

APP_VERSION=develop
VERSION=latest

docker build --no-cache --build-arg APP_VERSION=${APP_VERSION} --tag=itkdev/follow-searches:${VERSION} --file="follow-searches/Dockerfile" follow-searches
docker push itkdev/follow-searches:${VERSION}

docker build --no-cache --build-arg VERSION=${VERSION} --tag=itkdev/follow-searches-nginx:${VERSION} --file="nginx/Dockerfile" nginx
docker push itkdev/follow-searches-nginx:${VERSION}
