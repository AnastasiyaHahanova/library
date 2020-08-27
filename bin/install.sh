#!/bin/sh
php bin/console doctrine:fixtures:load --append

php bin/console app:load:countries --uploadDir "data" --fileName "countries.json"
