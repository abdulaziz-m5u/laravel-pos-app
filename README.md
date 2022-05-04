# Laravel 8 - Point of Sale Application

## Screenshots

![preview img](/preview.png)
![preview img](/preview2.png)

## Run Locally

Clone the project

```bash
  git clone https://github.com/abdulaziz-m5u/laravel-pos-app.git project-name
```

Go to the project directory

```bash
  cd project-name
```

-   Copy .env.example file to .env and edit database credentials there

```bash
    composer install
```

```bash
    php artisan key:generate
```

```bash
    php artisan migrate:fresh --seed
```

#### Login

-   email = admin@example.com
-   password = 123
