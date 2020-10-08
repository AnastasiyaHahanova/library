#!/bin/sh

php bin/console doctrine:database:create --if-not-exists

php bin/console doctrine:migrations:migrate

php bin/console doctrine:fixtures:load --append

php bin/console app:load:countries --uploadDir "data" --fileName "countries.json"

sh bin/assets.sh