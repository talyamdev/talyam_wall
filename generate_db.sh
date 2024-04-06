vendor/bin/propel sql:build
vendor/bin/propel model:build
vendor/bin/propel config:convert
vendor/bin/propel sql:insert
composer dump-autoload