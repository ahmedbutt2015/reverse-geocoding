# reverse-geocoding
Reverse Geocoding without using any third party api

Setup Instructions

####Installation

$ cd /path/to/project
$ composer install
$ sudo chmod 775 -R storage bootstrap/cache && sudo chown -R :www-data storage bootstrap/cache

#Migrations and Seeding

An sql file is uploaded named geoname.sql . Create a database and import this file on it.

#Database Environment
$ cp .env.example .env
DB_DATABASE=database_name
DB_USERNAME=your-username
DB_PASSWORD=your-password