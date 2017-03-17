# Setting up Doctrine Migrations for IBM i Projects

* Change default settings (user profile, password, and library) to your environment in cli-config.php

* Create a library/schema for development and a table to track migrations by running setup.sql

* download composer by running setup.sh

* run composer 
```sh
php composer.phar install
```

* Generate first empty migration class
```bash
$ vendor/bin/doctrine-migrations migrations:generate
```
