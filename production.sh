#!/usr/bin/env bash

cd production
docker-compose pull
docker-compose up -d
