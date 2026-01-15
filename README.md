## About Todo-list

<p align="center"><img width="910" height="611" alt="2026-01-15_12-27-33" src="https://github.com/user-attachments/assets/f1e4a343-748c-4f2b-895b-7e2225ddde25" /></p>
<p align="center"><img width="910" alt="2026-01-15_12-44-16" src="https://github.com/user-attachments/assets/1fe5d8ae-abfa-4f35-849f-d5b9fd284ea3" /></p>
<p align="center"><img width="910" alt="2026-01-15_12-51-43" src="https://github.com/user-attachments/assets/44e27014-98c9-435c-8304-b88f03d9bdde" /></p>

## Laravel, Inertia and Vue 3 Todo-list App

### Set up

composer install

php artisan key:generate

cp .env.example .env

### ENV config:
Add database to .env

Add the necessary env values; database, app name, app url etc

Create database tables and run seeder.

php artisan migarate --seed

### build front

npm install npm run watch for development or run npm run prod to build prod assets

### start server

php artisan serve
