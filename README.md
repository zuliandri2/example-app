## Small E-commerse

System reqruitment
- PHP 8.2 or later
- Mysql
- Docker
- Composer 2.6.5

## Installation
- Inside the project type "Composer update" in terminal
- run docker-compose by type './vendor/bin/sail up -d'
- make sure already connect with database and already have 'example_app' database name
- run command './vendor/bin/sail up -d' terminal
- migrate all databases with type './vendor/bin/sail artisan migrate:fresh --seed'
- type artisan './vendor/bin/sail db:seed --class=ProductsSeeder'
- type 'localhost' in web browser
- done


## Architecture

## How to use API

## Database Design
All action in db in this app base on laravel feature, like Create table, update or drop table. Init data using Seed     
of laravel 
