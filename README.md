# How to Setup App

In this markdown, you'll know how to setup the app!

## Clone
Clone this repo
> https://github.com/estotriramdani/birutekno-studycase.git

## Setup .env file
Open this repo in your favorite code editor, duplicate **.env.example** and rename it to **.env**, then find DB configuration lines. Change them to:

DB_CONNECTION=mysql <br>
DB_HOST=127.0.0.1 <br>
DB_PORT=3306 <br>
DB_DATABASE=**birutekno**<br>
DB_USERNAME={your_db_username}<br>
DB_PASSWORD={your_db_password}<br>

## Create Database

Create MySQL Database named "birutekno" which has mentioned above.

## Do Some Commands

 1. composer update
 2. php artisan generate:key
 3. php artisan migrate
 4. php artisan db:seed --class=AllowanceSeeder
 5. php artisan db:seed --class=RecapSeeder
 6. php artisan db:seed --class=EmployeeSeeder

## Run Local Development Server
Run command "php artisan serve" to make the app live.
