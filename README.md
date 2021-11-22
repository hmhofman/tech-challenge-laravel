# Dataswitcher tech challenge in Laravel

You should be able to complete these challenges in around 4 hours. There is no specific order you need to execute the tests in.

All of this stuff should work via Laravel Sail CLI, read more about that here:

https://laravel.com/docs/8.x/sail

No need to make any view (html) solutions for this.

## Getting started

1. Install Docker on your machine
2. Clone this repository
3. Go to the directory of the project (cd tech-challenge-laravel)
4. Execute the command ./vendor/bin/sail up

### Challenge 1

Convert the persons.csv file into the MongoDB collection that is in Person.php.

With the following requirements:

1. The resulting MongoDB collection should have exactly 500 rows
2. The full name should be split over three columns (firstname, suffix and lastname)
3. The country names should be stored as ISO 3166 codes (ie, AF, NL, etc) 


