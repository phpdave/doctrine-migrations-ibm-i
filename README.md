# Setting up Doctrine Migrations for IBM i Projects

* Change default settings (user profile, password, and library) to your environment in cli-config.php

* Create a library/schema for development
```sql
CREATE SCHEMA MYLIB IN ASP 1;
CL:CHGLIB LIB(MYLIB) TEXT('Database for My Application') ;
```

* Create a table to track migrations
```sql
CREATE TABLE MYLIB.MIGRATIONS
(
    VERSION varchar(255)
);
```

* Generate first empty migration class
```bash
$ vendor/bin/doctrine-migrations migrations:generate
```
