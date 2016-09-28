#!/bin/bash
php bin/console doctrine:schema:update --force
php vendor/bin/phpunit