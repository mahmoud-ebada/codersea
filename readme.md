# Installation guide
1. First of all clone the repo using `git clone git@github.com:mahmoud-ebada/codersea.git`.
2. Then run `composer install`.
3. `cp .evn.example .env` to copy and create .env file.
4. Edit .env file and set your environment variables for the database.
5. Make sure to set mail server variables in .env file, I prefer to use mailtrap it is easy to use.
6. Set the ```QUEUE_CONNECTION=database```.
7. Run `php artisan queue:table` to create a migration for the queue jobs database table, i use it for sending email in queue.
8. run `php artisan migrate`
9. run `php artisan db:seed`
10. run `php artisan storage:link`
11. open new terminal tab and run `php artisan queue:work` to run queue worker to process all queued jobs.


# Docker (Optional)
If you decide to use docker, please do the following steps
1. there is a directory called laradock open it `cd laradock` 
2. `cp -evn-example .env` to copy and create .env file.
3. Edit .env file and set mysql, phpmyadmin and (nginx or apache as you like) config variables.
4. if you want to use nginx run `docker-compose up -d nginx mysql phpmyadmin`, if you want tot use apache2 run `docker-compose up -d nginx mysql phpmyadmin`.
5. Then run the installation steps form setp 7 to step 11, by appending the following terminal command `docker-compose exec workspace ` to all php artisan commands, ex. `docker-compose exec workspace php artisan migrate` to migrate.
6. for reference and more information please visit https://laradock.io/

# FYI
1. I Added the seeder file to seed companies and employees table to test pagination.
2. I scheduled sending emails every Thursday at 4:30 pm.
Feel free to contact me for further information or any help.

