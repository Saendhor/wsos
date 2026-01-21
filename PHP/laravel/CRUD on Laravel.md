# CRUD on Laravel
- $laravel new app_name -n
- cd app_name, vim .env
- in the .env file, edit the parameters to look like your DB
- php artisan make:model -r -c -m makes model, controllers and create_x_table for x 
- php artisan migrate --step so the rollback is separated. Check with migrate:status
- php artisan serve and let the show begin >:]
