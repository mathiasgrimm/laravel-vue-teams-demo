# Laravel + Vue Teams Demo

Using Laravel 5.5 (LTS) + Vue 2.5

# Instalation

```git clone git@github.com:mathiasgrimm/laravel-vue-teams-demo.git```

```cd laravel-vue-teams-demo```

```composer install```

Create a database in your mysql:

```CREATE DATABASE `demo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;```

Copy you ```.env.example``` to ```.env``` and update the database credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=demo
DB_USERNAME=root
DB_PASSWORD=root
```

run ```php artisan key:generate```

run ```php artisan jwt:secret```

run ```php artisan migrate```

run ```php artisan db:seed```

run ```php artisan serve``` and point your browser to ```http://127.0.0.1:8000```