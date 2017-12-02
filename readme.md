# Overview

This is an open-source application built on the Codeigniter PHP framework and is not maintained.

# Setup Process

This setup guide is a high-level version of what steps you need to do. 

## Requirements

To be able to run the application you will need the following hosting / server setup:

- PHP 5.6 or greater
- MySQL 5.1 or greater
- SMTP email server


## Overview

To setup the Prelauncher, you will need to go through the following steps:

1. Install files on the server
2. Setup the database
3. Update database file in the code
4. Log into application and setup your campaign
5. Setup cron jobs in the server


## 1. Install Files on Server

You will need copy and paste all of the files onto your server in your root directory. This is typically a folder such as `www`, `html` or `public_html`. If you're unsure where this, refer to your hosting provider's documentation. This is typically done via an FTP application.

Note: Insure that the `.htaccess` file in the root directory (same as where you found this readme.md file) get's copied over. These file types are sometimes hidden from when viewing with a file explorer / finder.

If you loose it, than you can simply create a file labelled `.htaccess` with the following contents as follows:

```
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteBase /
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule ^(.*)$ index.php?/$1 [L]
</IfModule>

<IfModule !mod_rewrite.c>
  ErrorDocument 404 /index.php
</IfModule>
```


## 2. Setup Database

Get access to your MySQL server, typically this is done via phpMyAdmin via the control panel. This can also be done via command land. Create a `utf8_general_ci` database and import the `prelauncher_database.sql` file found in the `database` folder. This will be found in the root directory (same as where you found this readme.md file).


## 3. Update database file in code

Once the database is setup, you will need to edit your a single file in the code to connect the two together. You will need to edit the `database.php` file in the following directory `application/config/database.php`.

Once you have found this file, change the following lines of code (making sure to not remove the single quotes). Replace these with the values that match your server's setup.

```
$db['default']['username'] = '<username>';
$db['default']['password'] = '<password>';
$db['default']['database'] = '<database>';
```


## 4. Log Into Application Admin and Setup Campaign

Now that is the database is connected, log into the application by going to WEBSITE_DOMAIN/admin. Use the following information to login. Once you login, go to the `Profile` page and update the username, email and password right away for maximum security. 

### Admin:

- User: admin
- Pass: F)~4+kMJkf7Gh*/G

_If you wish, create some new admin users while logged in._


## 5. Setup Cron Jobs

Cron Jobs are required to allow you to be able to fire automated emails on the day before the final day of your campaign.

### Setting up via CLI (command line)

If you are going to run cron jobs via CLI (eg. via crontab) than you have two methods you can use. 

**You can access the index file, followed by the controller and function within.**

0 8 * * * php <doc_route:"/var/www/html">/index.php crons send_emails

Using this method, you will need to ensure the first line of your the **Crons** controller is configured as follows.

`if ( PHP_SAPI !== 'cli' ) exit('Web access not allowed');`

**An alternate method is via a URL.**

0 8 * * * curl <your_domain_here:prelauncher.net>/crons/send_emails/

`if ( PHP_SAPI === 'cli' ) exit('CLI access not allowed');`

*Note: Depending on your server time, change the number “8” to a number between 0 - 23 for the hour of the day you want to the emails to be sent.*

### Setting up via Control Panel

If you are using a hosting package where you are setting it up via control panel. Please review your hosting package’s documentation for exact instructions. However, you may need to setup as the following example.

Setup the minute, house, day, month and weekday parameters as seen above or preferred. Than in the command link put the following command.
