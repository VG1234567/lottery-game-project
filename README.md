# Project: "Lottery game"
## How to install and run the project
For a start clone the repository with the following command

```git clone https://github.com/VG1234567/lottery-game-project.git```

Run install composer

```install composer```

Next, run the docker using these commands

```docker-compose build```

```docker compose up -d```

Make sure the containers are running

```docker compose ps```

Run the migration and seeder

```php artisan migrate --seed```

And run server

```php artisan serve```

Import the collection "Lumen API.postman_collection.json" into the postman
