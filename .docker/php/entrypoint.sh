#!/bin/bash

composer install

/usr/bin/php /var/www/bin/yii migrate/up --interactive=0

/usr/bin/php /var/www/bin/yii gii/model --tableName=* --interactive=0 --overwrite=1


phpenmod xdebug

# This wi
# ll exec the CMD from your Dockerfile, i.e. "npm start"
exec "$@"