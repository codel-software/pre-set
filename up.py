import os
from os import system
from time import sleep

amb = os.environ['APP_ENV']

if amb == "production":
    system('php artisan migrate --force')
    system('php artisan route:cache')
    system('php artisan view:cache')
    system('php artisan config:cache')
    system('npm run production')
    system('apachectl -D FOREGROUND')

elif amb == 'TESTE':
    system('php artisan view:clear')
    system('php artisan route:clear')
    system('php artisan optimize:clear')
    system('php artisan cache:clear')
    system('php artisan config:clear')
    system('php artisan passport:install')
    system('php artisan db:seed')
    system('npm run dev')
    system('./vendor/phpunit/phpunit/phpunit')
else:
    system('php artisan view:clear')
    system('php artisan route:clear')
    system('php artisan optimize:clear')
    system('php artisan cache:clear')
    system('php artisan config:clear')
    system('apachectl -D FOREGROUND')

