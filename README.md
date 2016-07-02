# Social Packers
Application to help travelers to find projects abroad and exchange its work for food and a shelter.

## Configure hosts (Optional)
```console
127.0.0.1     socialpackers.com
``` 

## Configure httpd-vhosts.conf
```console
<Directory <path>/socialpackers>
  Require all granted
  Options Indexes FollowSymLinks
  AllowOverride All
</Directory>
``` 

```console
<VirtualHost *:80>
    DocumentRoot "<path>/socialpackers"
    ServerName socialpackers.com
</VirtualHost>
``` 

## Create the database
Check the database configuration before executing the SQL script. 
The config file can be found at /socialpackers/application/config/database.php

Then you can create the database and execute the file "DDBB_MODEL.sql" in it.
Then you may also set some countries and cities by executing "worlddb.sql"

