#!/bin/bash
php bin/console doctrine:database:create --if-not-exists
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load --no-interaction --purge-with-truncate
php vendor/bin/phpunit