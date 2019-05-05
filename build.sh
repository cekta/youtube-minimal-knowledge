#!/usr/bin/env bash

cd build
docker-compose build
docker-compose push
