# backend
- Requirements php8.2+ and latest version of composer
- `cd ./brand-api`
- Copy the .env.example lines in the .env file and replace the following keys `DB_DATABASE` with your database name `DB_USERNAME` with you mysql username and `DB_PASSWORD` with your mysql username password
- Run `composer install`
- Run `php artisan migrate:fresh --seed`
- Run `php artisan serve`
- On postman, use this base url `http://localhost:8001/api` to test the api
- `http://localhost:8001/api/brands` to get the list of brands.  GET methods
- `http://localhost:8001/api/brands/1` to get a specific id. GET methods
- `http://localhost:8001/api/brands/1` to delete a specific id. DELETE methods
# Frontend
- Use the lts version of nodeJS that 22.14.0
- open new terminal in whatever ide you are using then run `cd ../brand-frontend` and then run `npm run dev`


# Note 
 In the frontend i :
 - Set up axios configuration
 - Write services for the axios method call
 - Write store for the brand crud functionality
 - write interfaces with composables


# What is remaining
    The task that i have not yet done is :
- Create the components and pages to display the brands data, create, update and delete brand data