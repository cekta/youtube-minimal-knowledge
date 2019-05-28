#!/usr/bin/env bash

composer install
php -S 0.0.0.0:8000 public/index.php
