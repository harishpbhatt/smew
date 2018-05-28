php bin/console cache:clear --no-warmup
php bin/console cache:warmup
php bin/console cache:clear --env prod --no-warmup
php bin/console cache:warmup --env prod
php bin/console assets:install
