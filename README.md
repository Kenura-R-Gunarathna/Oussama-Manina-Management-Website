
## Installation ##

### Clone GitHub repo using the repository url. ###

Find a directory (folder)on your computer where you want to store the project. I make use of Laragon, so all my projects are inside a folder called `www/`, that is where I run the following command, which will pull the project from github and create a copy of it on my local computer at the “www” directory.

```
git clone https://github.com/Kenura-R-Gunarathna/kuku-food-store-website.git 
```

To get the link to the repo, just visit the github page and click on the green “clone or download” button on the right hand side. This will reveal a url that you will replace in the `Repository_url` part of the snippet above.

### cd into your project ###

To execute the rest of the commands, you will need to be inside that project . Type `cd projectName` to move to the working location of the project file we just created.

```
cd REPOSITORY_URL
```

### Install Composer Dependencies ###

Running composer, checks the `composer.json` file which is submitted to the github repo and lists all of the composer (PHP) packages that your repo requires.

```
composer install
```

### Create a copy of your .env file ###

`.env` files are not committed to source control for security reasons. But there is a `.env.example` which is a template of the `.env` file that the project have. So we will make a copy of the `.env.example` file and create a `.env` file from it.

```
cp .env.example .env
```

### Generate an app encryption key ###

Every laravel project requires an app encryption key which is generally randomly generated and stored in your `.env` file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.

```
php artisan key:generate
```

### Create an empty database for our application ###

Create an empty database for your project, your database name should correspond with your project name.

### Add database information to allow web app to connect to the database. ###

In the .env file fill in the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match the details of the database you just created. This will allow us to run migrations and seed the database if there is any table to seed.

### Add mail server information to allow web app to send emails. ###

In the .env file fill in the `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `DB_USERNAME`, and `MAIL_PASSWORD` options to match the details of the database you just created. This will allow the web app to connect to the mail sever and send messages.

For further details follow the blog : https://joy-joel.medium.com/how-to-set-up-a-laravel-project-cloned-from-github-e5cf3211ff53

## Turn the website from DEVELOPMENT => PROJECT ##

To complete configuration of caches in the site you can open th url : https://restaurantkuku.com/configure-site. By this all site data like view, cache are cleared and route, config cache are re-created. Or else you can follow the below method.

### Autoloader Optimization ###

When deploying to production, make sure that you are optimizing Composer's class autoloader map so Composer can quickly find the proper file to load for a given class:

```
composer install --optimize-autoloader --no-dev
```

### Caching Configuration ###

When deploying your application to production, you should make sure that you run the `config:cache` Artisan command during your deployment process:

```
php artisan config:cache
```

or open the url : https://restaurantkuku.com/cache-config

This command will combine all of Laravel's configuration files into a single, cached file, which greatly reduces the number of trips the framework must make to the filesystem when loading your configuration values.

### Caching Events ###

If your application is utilizing event discovery, you should cache your application's event to listener mappings during your deployment process. This can be accomplished by invoking the `event:cache` Artisan command during deployment:

```
php artisan event:cache
```

or open the url : https://restaurantkuku.com/clear-cache

### Caching Routes ###

If you are building a large application with many routes, you should make sure that you are running the `route:cache` Artisan command during your deployment process:

```
php artisan route:cache
```

or open the url : https://restaurantkuku.com/cache-route

This command reduces all of your route registrations into a single method call within a cached file, improving the performance of route registration when registering hundreds of routes.

### Caching Views ###

When deploying your application to production, you should make sure that you run the `view:cache` Artisan command during your deployment process:

```
php artisan view:cache
```

or open the url : https://restaurantkuku.com/clear-view

This command precompiles all your Blade views so they are not compiled on demand, improving the performance of each request that returns a view.

### Debug Mode ###

The debug option in your config/app.php configuration file determines how much information about an error is actually displayed to the user. By default, this option is set to respect the value of the `APP_DEBUG` environment variable, which is stored in your application's `.env` file.

In your production environment, this value should always be `false`. If the `APP_DEBUG` variable is set to `true` in production, you risk exposing sensitive configuration values to your application's end users.

### Editing the .htaccess ###

Chenge the code of .htaccess in project folder as,

```
RewriteEngine On
RewriteRule (.*) /public/$1 [L]

RewriteEngine On
RewriteCond %{HTTP:X-Forwarded-Proto} =http
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

If you are installing it on a server put the below code instead of above code.

```
<IfModule mod_headers.c>
    <FilesMatch>
        Header always set Content-Security-Policy "upgrade-insecure-requests;"
    </FilesMatch>
</IfModule>

RewriteEngine On
RewriteRule (.*) /public/$1 [L]

RewriteEngine On
RewriteCond %{HTTP:X-Forwarded-Proto} =http
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### Creating the database and the tables ###

run the below migration code to create the tanles wanted unseer the database names under `DB_DATABASE` in the `.env` file.

```
php artisan migrate
```
## Test the website ##

run the below code to start the seeding process that comes with the Laravel frame work to insert some data into tables to show the demo and for fut=rther development purposes.

```
php artisan db:seed
```

@Thank You, Kenura R. Gunarathna