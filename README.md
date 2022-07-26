## System
The project is based on the design pattern repository system

## Installation

Clone Repository

`git clone https://github.com/OmarTarekAbbas/project-troylab.git`

Move to the newly created directory

`cd /project-troylab`

Create a new .env file from .env.example

`cp .env.example .env`

Now edit your .env file and set your env parameters (Specially the database username/pass, database name)

Install dependencies

`composer install`

Generate a new key for your app

`php artisan key:generate`

Reload Database

`php artisan migrate:refresh --seed`

Done, You're ready to go

`php artisan serve`

collections PostMan.

`https://www.getpostman.com/collections/da8b54a7b84b68c84a51`

make unit test api for laravel 

`php artisan test`

If you want to look at the code in the file

`cd app\Modules`
