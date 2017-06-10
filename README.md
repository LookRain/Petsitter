# PetSitter
CS2102 Project

A demo can be accessed here: http://petsitter.luyu.rocks

## How to setup:
* Clone or download the repo
* Create .env file from the template .env.example file, change configuration in .env
* Create an empty cache folder under bootstrap
* Run 'composer install'
* Make a app key using 'php artisan key:generate'
* Run php artisan migrate
* Seed the database using 'php artisan db:seed'
