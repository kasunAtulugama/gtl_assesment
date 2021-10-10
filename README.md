<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Installation

Download the project and move it into your Apache server.

1. First you have to create a database name 'gtl_meetings'.
2. Then open command prompt and change directory to your project folder.

example:
```sh
cd D:\Program Files\XAMPP\htdocs\gtl_assesment\myapp
```

3. Then run below command to migrate the database.

```sh
php artisan migrate
```
4. Run 'php artisan serve' to run server
```sh
php artisan serve
```
5. Server is run on 'http://127.0.0.1:8000' server and you can check the api by accessing 'http://127.0.0.1:8000/api/v1/runner/3/form-data' this URL.


