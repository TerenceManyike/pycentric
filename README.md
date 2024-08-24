1. Make sure you have latest php and laravel version installed.
2. Clone the project using <git clone https://github.com/TerenceManyike/pycentric.git>
3. Go into the project <cd pycentric>
4. Run <composer install>
5. Prepare env file <cp .env.example .env>
6. In the env file adjust the variables according to your database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
7. Generate app key <php artisan key:generate>
8. Run migrations <php artisan key:generate>
9. Run the application <php artisan serve>
