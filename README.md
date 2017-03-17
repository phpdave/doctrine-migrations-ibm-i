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

* Modify your Migration class's up and down functions
```php
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $sql[]="Create Table Foo1;";
        $sql[]="Create Table Foo2;";
        $this->addSql($sql);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $sql[]="Drop Table Foo1;";
        $sql[]="Drop Table Foo2;";
        $this->addSql($sql);
    }
    ```
* Migrate to version 2
vendor/bin/doctrine-migrations migrations:execute --up 2

* Migrate down to version 1
vendor/bin/doctrine-migrations migrations:execute --down 1

other execute options 
--write-sql                            The path to output the migration SQL file instead of executing it.
--dry-run                              Execute the migration as a dry run.

* bad HACK needed if you dont have PDO
Remove all references to PDO in https://github.com/doctrine/dbal/blob/master/lib/Doctrine/DBAL/Connection.php#L24
